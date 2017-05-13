<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/13
 * Time: 15:37
 */

namespace etcd;

use etcd\grpc\BaseStub;
use etcd\grpc\BidiStreamingCall;

class WatchClient extends BaseStub
{
    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null)
    {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Watch watches for events happening or that have happened. Both input and output
     * are streams; the input stream is for creating and canceling watchers and the output
     * stream sends events. One watch RPC can watch on multiple key ranges, streaming events
     * for several watches at once. The entire event history can be watched starting from the
     * last compaction revision.
     * @param array $metadata metadata
     * @param array $options call options
     * @return BidiStreamingCall
     */
    public function Watch($metadata = [], $options = [])
    {
        return $this->_bidiRequest('/etcdserverpb.Watch/Watch',
            ['\Etcdserverpb\WatchResponse', 'decode'],
            $metadata,
            $options
        );
    }
}