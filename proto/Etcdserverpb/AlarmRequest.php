<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rpc.proto

namespace Etcdserverpb;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>etcdserverpb.AlarmRequest</code>
 */
class AlarmRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * <pre>
     * action is the kind of alarm request to issue. The action
     * may GET alarm statuses, ACTIVATE an alarm, or DEACTIVATE a
     * raised alarm.
     * </pre>
     *
     * <code>.etcdserverpb.AlarmRequest.AlarmAction action = 1;</code>
     */
    private $action = 0;
    /**
     * <pre>
     * memberID is the ID of the member associated with the alarm. If memberID is 0, the
     * alarm request covers all members.
     * </pre>
     *
     * <code>uint64 memberID = 2;</code>
     */
    private $memberID = 0;
    /**
     * <pre>
     * alarm is the type of alarm to consider for this request.
     * </pre>
     *
     * <code>.etcdserverpb.AlarmType alarm = 3;</code>
     */
    private $alarm = 0;

    public function __construct() {
        \GPBMetadata\Rpc::initOnce();
        parent::__construct();
    }

    /**
     * <pre>
     * action is the kind of alarm request to issue. The action
     * may GET alarm statuses, ACTIVATE an alarm, or DEACTIVATE a
     * raised alarm.
     * </pre>
     *
     * <code>.etcdserverpb.AlarmRequest.AlarmAction action = 1;</code>
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * <pre>
     * action is the kind of alarm request to issue. The action
     * may GET alarm statuses, ACTIVATE an alarm, or DEACTIVATE a
     * raised alarm.
     * </pre>
     *
     * <code>.etcdserverpb.AlarmRequest.AlarmAction action = 1;</code>
     */
    public function setAction($var)
    {
        GPBUtil::checkEnum($var, \Etcdserverpb\AlarmRequest_AlarmAction::class);
        $this->action = $var;
    }

    /**
     * <pre>
     * memberID is the ID of the member associated with the alarm. If memberID is 0, the
     * alarm request covers all members.
     * </pre>
     *
     * <code>uint64 memberID = 2;</code>
     */
    public function getMemberID()
    {
        return $this->memberID;
    }

    /**
     * <pre>
     * memberID is the ID of the member associated with the alarm. If memberID is 0, the
     * alarm request covers all members.
     * </pre>
     *
     * <code>uint64 memberID = 2;</code>
     */
    public function setMemberID($var)
    {
        GPBUtil::checkUint64($var);
        $this->memberID = $var;
    }

    /**
     * <pre>
     * alarm is the type of alarm to consider for this request.
     * </pre>
     *
     * <code>.etcdserverpb.AlarmType alarm = 3;</code>
     */
    public function getAlarm()
    {
        return $this->alarm;
    }

    /**
     * <pre>
     * alarm is the type of alarm to consider for this request.
     * </pre>
     *
     * <code>.etcdserverpb.AlarmType alarm = 3;</code>
     */
    public function setAlarm($var)
    {
        GPBUtil::checkEnum($var, \Etcdserverpb\AlarmType::class);
        $this->alarm = $var;
    }

}

