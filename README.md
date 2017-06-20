# swoole-etcd
PHP Etcd v3 Client base on Swoole Http2 Client

# Document

## 发起一个普通请求
```php
// 连接到etcd服务器
$client = new KVClient('127.0.0.1:2379', []);
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
```

## 发起一个Watch请求

在Etcd中，可以通过一个Watch命令来建立与服务器的双工通信。

```php
// 连接到etcd服务器
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

```

# 依赖

* [Swoole扩展](https://github.com/swoole/swoole-src) 1.9.12 +
* [PHP-X](https://github.com/swoole/PHP-X) Latest Version
* [Http2 Client Extension](https://github.com/CatsSystem/swoole-extension) Latest Version


## 引入库
composer.json

```json

{
    "require": {
        "cat-sys/swoole-etcd": "dev-master"
    }
}

```
