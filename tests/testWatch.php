<?php
/*******************************************************************************
 *  This file is part of swoole-etcd.
 *
 *  swoole-etcd is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  swoole-etcd is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *******************************************************************************
 * Author: Lidanyang  <simonarthur2012@gmail.com>
 ******************************************************************************/

use etcd\KVClient;
use etcd\WatchClient;
use Etcdserverpb\PutRequest;

require_once __DIR__ . '/../vendor/autoload.php';

$watch_client = new WatchClient('127.0.0.1:2379', []);
$watch_client->connect(3, function(WatchClient $client, $errCode) {
    if($errCode != 0)
    {
        return;
    }
    $call = $client->Watch();
    $call->waiting(function($result) use ($call, $client){
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
});

