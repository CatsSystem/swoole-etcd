<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/13
 * Time: 15:37
 */

namespace etcd;

use Etcdserverpb\AuthDisableRequest;
use Etcdserverpb\AuthEnableRequest;
use Etcdserverpb\AuthenticateRequest;
use Etcdserverpb\AuthRoleAddRequest;
use Etcdserverpb\AuthRoleDeleteRequest;
use Etcdserverpb\AuthRoleGetRequest;
use Etcdserverpb\AuthRoleGrantPermissionRequest;
use Etcdserverpb\AuthRoleListRequest;
use Etcdserverpb\AuthRoleRevokePermissionRequest;
use Etcdserverpb\AuthUserAddRequest;
use Etcdserverpb\AuthUserChangePasswordRequest;
use Etcdserverpb\AuthUserDeleteRequest;
use Etcdserverpb\AuthUserGetRequest;
use Etcdserverpb\AuthUserGrantRoleRequest;
use Etcdserverpb\AuthUserListRequest;
use Etcdserverpb\AuthUserRevokeRoleRequest;
use etcd\grpc\UnaryCall;
use etcd\grpc\BaseStub;

class AuthClient extends BaseStub
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
     * AuthEnable enables authentication.
     * @param AuthEnableRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function AuthEnable(AuthEnableRequest $argument,
                               $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/AuthEnable',
            $argument,
            ['\Etcdserverpb\AuthEnableResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * AuthDisable disables authentication.
     * @param AuthDisableRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function AuthDisable(AuthDisableRequest $argument,
                                $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/AuthDisable',
            $argument,
            ['\Etcdserverpb\AuthDisableResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * Authenticate processes an authenticate request.
     * @param AuthenticateRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function Authenticate(AuthenticateRequest $argument,
                                 $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/Authenticate',
            $argument,
            ['\Etcdserverpb\AuthenticateResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * UserAdd adds a new user.
     * @param AuthUserAddRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function UserAdd(AuthUserAddRequest $argument,
                            $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserAdd',
            $argument,
            ['\Etcdserverpb\AuthUserAddResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * UserGet gets detailed user information.
     * @param AuthUserGetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function UserGet(AuthUserGetRequest $argument,
                            $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserGet',
            $argument,
            ['\Etcdserverpb\AuthUserGetResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * UserList gets a list of all users.
     * @param AuthUserListRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function UserList(AuthUserListRequest $argument,
                             $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserList',
            $argument,
            ['\Etcdserverpb\AuthUserListResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * UserDelete deletes a specified user.
     * @param AuthUserDeleteRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function UserDelete(AuthUserDeleteRequest $argument,
                               $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserDelete',
            $argument,
            ['\Etcdserverpb\AuthUserDeleteResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * UserChangePassword changes the password of a specified user.
     * @param AuthUserChangePasswordRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function UserChangePassword(AuthUserChangePasswordRequest $argument,
                                       $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserChangePassword',
            $argument,
            ['\Etcdserverpb\AuthUserChangePasswordResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * UserGrant grants a role to a specified user.
     * @param AuthUserGrantRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function UserGrantRole(AuthUserGrantRoleRequest $argument,
                                  $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserGrantRole',
            $argument,
            ['\Etcdserverpb\AuthUserGrantRoleResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * UserRevokeRole revokes a role of specified user.
     * @param AuthUserRevokeRoleRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function UserRevokeRole(AuthUserRevokeRoleRequest $argument,
                                   $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/UserRevokeRole',
            $argument,
            ['\Etcdserverpb\AuthUserRevokeRoleResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * RoleAdd adds a new role.
     * @param AuthRoleAddRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function RoleAdd(AuthRoleAddRequest $argument,
                            $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleAdd',
            $argument,
            ['\Etcdserverpb\AuthRoleAddResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * RoleGet gets detailed role information.
     * @param AuthRoleGetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function RoleGet(AuthRoleGetRequest $argument,
                            $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleGet',
            $argument,
            ['\Etcdserverpb\AuthRoleGetResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * RoleList gets lists of all roles.
     * @param AuthRoleListRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function RoleList(AuthRoleListRequest $argument,
                             $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleList',
            $argument,
            ['\Etcdserverpb\AuthRoleListResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * RoleDelete deletes a specified role.
     * @param AuthRoleDeleteRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function RoleDelete(AuthRoleDeleteRequest $argument,
                               $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleDelete',
            $argument,
            ['\Etcdserverpb\AuthRoleDeleteResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * RoleGrantPermission grants a permission of a specified key or range to a specified role.
     * @param AuthRoleGrantPermissionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function RoleGrantPermission(AuthRoleGrantPermissionRequest $argument,
                                        $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleGrantPermission',
            $argument,
            ['\Etcdserverpb\AuthRoleGrantPermissionResponse', 'decode'],
            $metadata, $options);
    }

    /**
     * RoleRevokePermission revokes a key or range permission of a specified role.
     * @param AuthRoleRevokePermissionRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return UnaryCall
     */
    public function RoleRevokePermission(AuthRoleRevokePermissionRequest $argument,
                                         $metadata = [], $options = [])
    {
        return $this->_simpleRequest('/etcdserverpb.Auth/RoleRevokePermission',
            $argument,
            ['\Etcdserverpb\AuthRoleRevokePermissionResponse', 'decode'],
            $metadata, $options);
    }

}