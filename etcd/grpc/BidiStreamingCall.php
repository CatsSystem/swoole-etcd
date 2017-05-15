<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/4
 * Time: 14:43
 */

namespace etcd\grpc;

class BidiStreamingCall extends Call
{
    /**
     * @param $argument
     * @throws \Exception
     */
    public function push($argument)
    {
        if(empty($this->callback))
        {
            throw new \Exception("Please set waiting callback before push message");
        }
        $msg = $this->_serializeMessage($argument);
        $data = pack('CN', 0, strlen($msg)) . $msg;
        $this->client->push($this->stream_id, $data);
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

    public function close()
    {
        $this->client->closeStream($this->stream_id);
    }
}
