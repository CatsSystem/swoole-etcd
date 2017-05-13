<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/4
 * Time: 14:46
 */

namespace etcd\grpc;

class ServerStreamingCall extends Call
{
    /**
     * @var \swoole_http2_client
     */
    protected $client;

    public function __construct(&$client, $deserialize)
    {
        parent::__construct($deserialize);
        $this->client = $client;
    }

    public function onReceive($response)
    {
        if($response->body){
            $data = substr($response->body, 5);
            $this->result[] = [$this->_deserializeResponse($data), $response->statusCode];
            if(is_callable($this->callback))
            {
                foreach ($this->result as $item)
                {
                    call_user_func($this->callback, $item);
                }
                $this->result = [];
            }
        }
        else // close stream
        {
            $this->client->closeStream($this->stream_id);
        }
    }

    /**
     * @param mixed $callback
     * @throws \Exception
     */
    public function waiting($callback)
    {
        if( !is_callable($callback) )
        {
            throw new \Exception("Callback is not callable!");
        }
        $this->callback = $callback;
    }
}
