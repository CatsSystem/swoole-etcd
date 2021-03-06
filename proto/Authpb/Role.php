<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: auth.proto

namespace Authpb;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * <pre>
 * Role is a single entry in the bucket authRoles
 * </pre>
 *
 * Protobuf type <code>authpb.Role</code>
 */
class Role extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>bytes name = 1;</code>
     */
    private $name = '';
    /**
     * <code>repeated .authpb.Permission keyPermission = 2;</code>
     */
    private $keyPermission;

    public function __construct() {
        \GPBMetadata\Auth::initOnce();
        parent::__construct();
    }

    /**
     * <code>bytes name = 1;</code>
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * <code>bytes name = 1;</code>
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, False);
        $this->name = $var;
    }

    /**
     * <code>repeated .authpb.Permission keyPermission = 2;</code>
     */
    public function getKeyPermission()
    {
        return $this->keyPermission;
    }

    /**
     * <code>repeated .authpb.Permission keyPermission = 2;</code>
     */
    public function setKeyPermission(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Authpb\Permission::class);
        $this->keyPermission = $arr;
    }

}

