<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Etcdserverpb;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>etcdserverpb.AuthUserRevokeRoleRequest</code>
 */
class AuthUserRevokeRoleRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * <code>string role = 2;</code>
     */
    private $role = '';

    public function __construct() {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct();
    }

    /**
     * <code>string name = 1;</code>
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * <code>string name = 1;</code>
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;
    }

    /**
     * <code>string role = 2;</code>
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * <code>string role = 2;</code>
     */
    public function setRole($var)
    {
        GPBUtil::checkString($var, True);
        $this->role = $var;
    }

}

