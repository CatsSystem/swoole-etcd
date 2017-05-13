<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: kv.proto

namespace Mvccpb;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>mvccpb.KeyValue</code>
 */
class KeyValue extends \Google\Protobuf\Internal\Message
{
    /**
     * <pre>
     * key is the key in bytes. An empty key is not allowed.
     * </pre>
     *
     * <code>bytes key = 1;</code>
     */
    private $key = '';
    /**
     * <pre>
     * create_revision is the revision of last creation on this key.
     * </pre>
     *
     * <code>int64 create_revision = 2;</code>
     */
    private $create_revision = 0;
    /**
     * <pre>
     * mod_revision is the revision of last modification on this key.
     * </pre>
     *
     * <code>int64 mod_revision = 3;</code>
     */
    private $mod_revision = 0;
    /**
     * <pre>
     * version is the version of the key. A deletion resets
     * the version to zero and any modification of the key
     * increases its version.
     * </pre>
     *
     * <code>int64 version = 4;</code>
     */
    private $version = 0;
    /**
     * <pre>
     * value is the value held by the key, in bytes.
     * </pre>
     *
     * <code>bytes value = 5;</code>
     */
    private $value = '';
    /**
     * <pre>
     * lease is the ID of the lease that attached to key.
     * When the attached lease expires, the key will be deleted.
     * If lease is 0, then no lease is attached to the key.
     * </pre>
     *
     * <code>int64 lease = 6;</code>
     */
    private $lease = 0;

    public function __construct() {
        \GPBMetadata\Kv::initOnce();
        parent::__construct();
    }

    /**
     * <pre>
     * key is the key in bytes. An empty key is not allowed.
     * </pre>
     *
     * <code>bytes key = 1;</code>
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * <pre>
     * key is the key in bytes. An empty key is not allowed.
     * </pre>
     *
     * <code>bytes key = 1;</code>
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, False);
        $this->key = $var;
    }

    /**
     * <pre>
     * create_revision is the revision of last creation on this key.
     * </pre>
     *
     * <code>int64 create_revision = 2;</code>
     */
    public function getCreateRevision()
    {
        return $this->create_revision;
    }

    /**
     * <pre>
     * create_revision is the revision of last creation on this key.
     * </pre>
     *
     * <code>int64 create_revision = 2;</code>
     */
    public function setCreateRevision($var)
    {
        GPBUtil::checkInt64($var);
        $this->create_revision = $var;
    }

    /**
     * <pre>
     * mod_revision is the revision of last modification on this key.
     * </pre>
     *
     * <code>int64 mod_revision = 3;</code>
     */
    public function getModRevision()
    {
        return $this->mod_revision;
    }

    /**
     * <pre>
     * mod_revision is the revision of last modification on this key.
     * </pre>
     *
     * <code>int64 mod_revision = 3;</code>
     */
    public function setModRevision($var)
    {
        GPBUtil::checkInt64($var);
        $this->mod_revision = $var;
    }

    /**
     * <pre>
     * version is the version of the key. A deletion resets
     * the version to zero and any modification of the key
     * increases its version.
     * </pre>
     *
     * <code>int64 version = 4;</code>
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * <pre>
     * version is the version of the key. A deletion resets
     * the version to zero and any modification of the key
     * increases its version.
     * </pre>
     *
     * <code>int64 version = 4;</code>
     */
    public function setVersion($var)
    {
        GPBUtil::checkInt64($var);
        $this->version = $var;
    }

    /**
     * <pre>
     * value is the value held by the key, in bytes.
     * </pre>
     *
     * <code>bytes value = 5;</code>
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * <pre>
     * value is the value held by the key, in bytes.
     * </pre>
     *
     * <code>bytes value = 5;</code>
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, False);
        $this->value = $var;
    }

    /**
     * <pre>
     * lease is the ID of the lease that attached to key.
     * When the attached lease expires, the key will be deleted.
     * If lease is 0, then no lease is attached to the key.
     * </pre>
     *
     * <code>int64 lease = 6;</code>
     */
    public function getLease()
    {
        return $this->lease;
    }

    /**
     * <pre>
     * lease is the ID of the lease that attached to key.
     * When the attached lease expires, the key will be deleted.
     * If lease is 0, then no lease is attached to the key.
     * </pre>
     *
     * <code>int64 lease = 6;</code>
     */
    public function setLease($var)
    {
        GPBUtil::checkInt64($var);
        $this->lease = $var;
    }

}
