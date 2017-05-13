<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/4
 * Time: 14:27
 */

namespace etcd\grpc;

class UnaryCall extends Call
{

    public function wait($callback)
    {
        if($this->result)
        {
            call_user_func($callback, $this->result);
        }
        $this->callback = $callback;
    }
}