<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Etcdserverpb;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>etcdserverpb.AuthDisableResponse</code>
 */
class AuthDisableResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>.etcdserverpb.ResponseHeader header = 1;</code>
     */
    private $header = null;

    public function __construct() {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct();
    }

    /**
     * <code>.etcdserverpb.ResponseHeader header = 1;</code>
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * <code>.etcdserverpb.ResponseHeader header = 1;</code>
     */
    public function setHeader(&$var)
    {
        GPBUtil::checkMessage($var, \Etcdserverpb\ResponseHeader::class);
        $this->header = $var;
    }

}

