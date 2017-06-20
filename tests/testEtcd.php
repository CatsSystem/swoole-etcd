<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/3
 * Time: 14:48
 */

use etcd\KVClient;
use Etcdserverpb\PutRequest;

require_once __DIR__ . '/../vendor/autoload.php';

$client = new KVClient('127.0.0.1:2379', [], function(){
    echo "client closed\n";
});
$client->connect(3, function($cli, $errCode) use ($client) {
    if($errCode != 0)
    {
        return;
    }
    $request = new PutRequest();
    $request->setKey("Hello");
    $request->setValue("test");
    $request->setPrevKv(true);
    $call = $client->Put($request);
    if($call)
    {
        $call->wait(function($result) use ($client){
            list($reply, $status) = $result;
            if($status != 200)
            {
                var_dump("Error");
                return;
            }
            if($reply instanceof \Etcdserverpb\PutResponse)
            {
                $item = $reply->getPrevKv();
                echo sprintf("update key[%s] success, pre value = %s\n", $item->getKey(), $item->getValue());
            }
        });
    } else {
        echo "request failed! Client closed\n";
    }
});




