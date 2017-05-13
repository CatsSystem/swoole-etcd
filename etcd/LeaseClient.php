<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/13
 * Time: 15:37
 */

namespace etcd;

use Etcdserverpb\LeaseGrantRequest;
use Etcdserverpb\LeaseRevokeRequest;
use Etcdserverpb\LeaseTimeToLiveRequest;
use etcd\grpc\BaseStub;
use etcd\grpc\UnaryCall;

class LeaseClient extends BaseStub
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
     * LeaseGrant creates a lease which expires if the server does not receive a keepAlive
     * within a given time to live period. All keys attached to the lease will be expired and
     * deleted if the lease expires. Each expired key generates a delete event in the event history.
     * @param LeaseGrantRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function LeaseGrant(LeaseGrantRequest $argument,
                               $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Lease/LeaseGrant',
            $argument,
            ['\Etcdserverpb\LeaseGrantResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * LeaseRevoke revokes a lease. All keys attached to the lease will expire and be deleted.
     * @param LeaseRevokeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function LeaseRevoke(LeaseRevokeRequest $argument,
                                $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Lease/LeaseRevoke',
            $argument,
            ['\Etcdserverpb\LeaseRevokeResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * LeaseKeepAlive keeps the lease alive by streaming keep alive requests from the client
     * to the server and streaming keep alive responses from the server to the client.
     * @param array $metadata metadata
     * @param array $options call options
     * @return BidiStreamingCall
     */
    public function LeaseKeepAlive($metadata = [], $options = [])
    {
        return $this->_bidiRequest('/etcdserverpb.Lease/LeaseKeepAlive',
            ['\Etcdserverpb\LeaseKeepAliveResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * LeaseTimeToLive retrieves lease information.
     * @param LeaseTimeToLiveRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function LeaseTimeToLive(LeaseTimeToLiveRequest $argument,
                                    $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Lease/LeaseTimeToLive',
            $argument,
            ['\Etcdserverpb\LeaseTimeToLiveResponse', 'decode'],
            $metadata,
            $options
        );
    }
}