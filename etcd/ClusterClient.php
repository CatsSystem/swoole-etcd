<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/13
 * Time: 15:37
 */

namespace etcd;

use Etcdserverpb\MemberAddRequest;
use Etcdserverpb\MemberListRequest;
use Etcdserverpb\MemberRemoveRequest;
use Etcdserverpb\MemberUpdateRequest;
use etcd\grpc\BaseStub;
use etcd\grpc\UnaryCall;

class ClusterClient extends BaseStub
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
     * MemberAdd adds a member into the cluster.
     * @param MemberAddRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function MemberAdd(MemberAddRequest $argument,
                              $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Cluster/MemberAdd',
            $argument,
            ['\Etcdserverpb\MemberAddResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * MemberRemove removes an existing member from the cluster.
     * @param MemberRemoveRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function MemberRemove(MemberRemoveRequest $argument,
                                 $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Cluster/MemberRemove',
            $argument,
            ['\Etcdserverpb\MemberRemoveResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * MemberUpdate updates the member configuration.
     * @param MemberUpdateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function MemberUpdate(MemberUpdateRequest $argument,
                                 $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Cluster/MemberUpdate',
            $argument,
            ['\Etcdserverpb\MemberUpdateResponse', 'decode'],
            $metadata,
            $options
        );
    }

    /**
     * MemberList lists all the members in the cluster.
     * @param MemberListRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function MemberList(MemberListRequest $argument,
                               $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Cluster/MemberList',
            $argument,
            ['\Etcdserverpb\MemberListResponse', 'decode'],
            $metadata,
            $options
        );
    }
}