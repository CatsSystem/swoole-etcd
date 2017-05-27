<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/3
 * Time: 14:48
 */

use etcd\KVClient;
use etcd\WatchClient;
use Etcdserverpb\PutRequest;
use Etcdserverpb\RangeRequest;

require_once __DIR__ . '/../vendor/autoload.php';


//$client = new KVClient('172.20.110.137:2379', []);
$client = new KVClient('127.0.0.1:2379', [], function(){
    echo "client closed\n";
});

$request = new PutRequest();
$request->setKey("Hello");
$request->setValue("test");
$request->setPrevKv(true);
$call = $client->Put($request);
if($call)
{
    $call->wait(function($result) use ($client){
        list($reply, $status) = $result;
        if($status == 500)
        {
            var_dump("Error");
            return;
        }
        if($reply instanceof \Etcdserverpb\PutResponse)
        {
            $item = $reply->getPrevKv();
            echo sprintf("update key[%s] success, pre value = %s\n", $item->getKey(), $item->getValue());
        }
        swoole_timer_after(3000, function() use ($client) {
            $request = new RangeRequest();
            $request->setKey("Hello");
            $call = $client->Range($request);
            if($call)
            {
                $call->wait(function ($result) {
                    list($reply, $status) = $result;
                    if ($reply instanceof \Etcdserverpb\RangeResponse) {
                        $list = $reply->getKvs();
                        echo sprintf("get %d items \n", $reply->getCount());
                        foreach ($list as $item) {
                            echo sprintf("key[%s] = %s\n", $item->getKey(), $item->getValue());
                        }
                    }
                });
            } else {
                echo "request failed! Client closed\n";
            }
        });
    });
} else {
    echo "request failed! Client closed\n";
}


$watch_client = new WatchClient('172.20.111.172:2379', []);
$call = $watch_client->Watch();
$call->waiting(function($result) use ($call){
    list($response, $status) = $result;
    if($response->getCreated() || $response->getCanceled())
    {
        return;
    }
    foreach ($response->getEvents() as $event)
    {
        $type = $event->getType();
        switch($type)
        {
            case 0:
            {
                $kv = $event->getKv();
                echo sprintf("Put key[%s] = %s\n",  $kv->getKey(), $kv->getValue());

                break;
            }
            case 1:
            {
                break;
            }
        }
    }
    $call->close();
});
$request = new \Etcdserverpb\WatchRequest();
$create = new \Etcdserverpb\WatchCreateRequest();
$create->setKey("Hello");
$request->setCreateRequest($create);
$call->push($request);

swoole_timer_after(2000, function() use ($call) {
    $request = new \Etcdserverpb\WatchRequest();
    $create = new \Etcdserverpb\WatchCreateRequest();
    $create->setKey("Hello");
    $request->setCreateRequest($create);
    $call->push($request);
});

