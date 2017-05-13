<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/13
 * Time: 15:37
 */
namespace etcd;

use Etcdserverpb\AlarmRequest;
use Etcdserverpb\DefragmentRequest;
use Etcdserverpb\HashRequest;
use Etcdserverpb\SnapshotRequest;
use Etcdserverpb\StatusRequest;
use etcd\grpc\BaseStub;
use etcd\grpc\UnaryCall;
use etcd\grpc\ServerStreamingCall;

class MaintenanceClient extends BaseStub
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
     * Alarm activates, deactivates, and queries alarms regarding cluster health.
     * @param AlarmRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Alarm(AlarmRequest $argument,
                          $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Maintenance/Alarm',
            $argument,
            ['\Etcdserverpb\AlarmResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * Status gets the status of the member.
     * @param StatusRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Status(StatusRequest $argument,
                           $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Maintenance/Status',
            $argument,
            ['\Etcdserverpb\StatusResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * Defragment defragments a member's backend database to recover storage space.
     * @param DefragmentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Defragment(DefragmentRequest $argument,
                               $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Maintenance/Defragment',
            $argument,
            ['\Etcdserverpb\DefragmentResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * Hash returns the hash of the local KV state for consistency checking purpose.
     * This is designed for testing; do not use this in production when there
     * are ongoing transactions.
     * @param HashRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Hash(HashRequest $argument,
                         $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Maintenance/Hash',
            $argument,
            ['\Etcdserverpb\HashResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * Snapshot sends a snapshot of the entire backend from a member over a stream to a client.
     * @param SnapshotRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return ServerStreamingCall
     */
    public function Snapshot(SnapshotRequest $argument,
                             $metadata = [], $options = [])
    {
        return $this->_serverStreamRequest('/etcdserverpb.Maintenance/Snapshot',
            $argument,
            ['\Etcdserverpb\SnapshotResponse', 'decode'],
            $metadata, $options);
    }
}