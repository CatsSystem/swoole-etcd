<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/13
 * Time: 15:35
 */

namespace etcd;

use Etcdserverpb\CompactionRequest;
use Etcdserverpb\DeleteRangeRequest;
use Etcdserverpb\PutRequest;
use Etcdserverpb\RangeRequest;
use Etcdserverpb\TxnRequest;
use etcd\grpc\BaseStub;
use etcd\grpc\UnaryCall;


class KVClient extends BaseStub
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
     * Range gets the keys in the range from the key-value store.
     * @param RangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Range(RangeRequest $argument,
                          $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.KV/Range',
            $argument,
            ['\Etcdserverpb\RangeResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * Put puts the given key into the key-value store.
     * A put request increments the revision of the key-value store
     * and generates one event in the event history.
     * @param PutRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Put(PutRequest $argument,
                        $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.KV/Put',
            $argument,
            ['\Etcdserverpb\PutResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * DeleteRange deletes the given range from the key-value store.
     * A delete request increments the revision of the key-value store
     * and generates a delete event in the event history for every deleted key.
     * @param DeleteRangeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function DeleteRange(DeleteRangeRequest $argument,
                                $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.KV/DeleteRange',
            $argument,
            ['\Etcdserverpb\DeleteRangeResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * Txn processes multiple requests in a single transaction.
     * A txn request increments the revision of the key-value store
     * and generates events with the same revision for every completed request.
     * It is not allowed to modify the same key several times within one txn.
     * @param TxnRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Txn(TxnRequest $argument,
                        $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.KV/Txn',
            $argument,
            ['\Etcdserverpb\TxnResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * Compact compacts the event history in the etcd key-value store. The key-value
     * store should be periodically compacted or the event history will continue to grow
     * indefinitely.
     * @param CompactionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Compact(CompactionRequest $argument,
                            $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.KV/Compact',
            $argument,
            ['\Etcdserverpb\CompactionResponse', 'decode'],
            $metadata,
            $options
        );
    }
}