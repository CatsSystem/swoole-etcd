<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/4
 * Time: 14:41
 */

namespace etcd\grpc;

class Call
{
    private $deserialize;

    protected $callback = null;

    protected $result = null;

    protected $stream_id;

    /**
     * @var \swoole_http2_client
     */
    protected $client;

    /**
     * Call constructor.
     * @param \swoole_http2_client $client
     * @param mixed $deserialize
     */
    public function __construct(&$client, $deserialize)
    {
        $this->deserialize = $deserialize;
        $this->client = $client;
    }

    /**
     * @param mixed $stream_id
     */
    public function setStreamId($stream_id)
    {
        $this->stream_id = $stream_id;
    }


    public function onReceive($response)
    {
        if($response->body){
            $data = substr($response->body, 5);
            $this->result = [$this->_deserializeResponse($data), $response->statusCode];
            if(is_callable($this->callback))
            {
                call_user_func($this->callback, $this->result);
            }
        } else {
            $this->result = [null, $response->statusCode];
            if(is_callable($this->callback))
            {
                call_user_func($this->callback, $this->result);
            }
        }
    }

    public function isClose()
    {
        return $this->client->closed;
    }

    protected function _serializeMessage($data)
    {
        if (method_exists($data, 'encode')) {
            return $data->encode();
        } elseif (method_exists($data, 'serializeToString')) {
            return $data->serializeToString();
        }
        return $data->serialize();
    }

    protected function _deserializeResponse($value)
    {
        if ($value === null) {
            return null;
        }
        if (is_array($this->deserialize)) {
            list($className, $deserializeFunc) = $this->deserialize;
            $obj = new $className();
            if (method_exists($obj, $deserializeFunc)) {
                $obj->$deserializeFunc($value);
            } else {
                $obj->mergeFromString($value);
            }
            return $obj;
        }
        return call_user_func($this->deserialize, $value);
    }
}