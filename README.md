# swoole-etcd
PHP Etcd v3 Client base on Swoole Http2 Client

# Document

## 发起一个普通请求
```php
// 连接到etcd服务器
$client = new KVClient('127.0.0.1:2379', []);

// 创建一个Put请求
$request = new PutRequest();
$request->setKey("Hello");
$request->setValue("test");
$request->setPrevKv(true);

// 发起请求，并在回调函数中获取返回值
$client->Put($request)->wait(function($result){
    list($reply, $status) = $result;
    if($reply instanceof \Etcdserverpb\PutResponse)
    {
        $item = $reply->getPrevKv();
        echo sprintf("update key[%s] success, pre value = %s\n", $item->getKey(), $item->getValue());
    }
});
```

## 发起一个Watch请求

在Etcd中，可以通过一个Watch命令来建立与服务器的双工通信。

```php
// 连接到etcd服务器
$watch_client = new WatchClient('127.0.0.1:2379', []);

// 发起一个Watch请求并获取到处理句柄
$call = $watch_client->Watch();

// 设置回调函数，用于监听来自etcd服务的主动推送
$call->waiting(function($result){
    list($response, $status) = $result;
    // 循环处理监听到的事件
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
                var_dump("delete");
                break;
            }
        }
    }
});

// 构建一个WatchRequst请求，请求监听Key值"Hello"的事件
$request = new \Etcdserverpb\WatchRequest();
$create = new \Etcdserverpb\WatchCreateRequest();
$create->setKey("Hello");
$request->setCreateRequest($create);
// 发送请求（发送请求前必须调用 waiting 函数）
$call->push($request);

```

# Install

composer.json

```json

{
    "require": {
        "cat-sys/swoole-etcd": "^0.1.0"
    }
}

```