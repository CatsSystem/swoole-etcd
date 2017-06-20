<?php
/**
 * Created by PhpStorm.
 * User: lidanyang
 * Date: 17/5/3
 * Time: 18:31
 */

namespace etcd\grpc;

class BaseStub
{

    private $hostname;
    private $host;
    private $port;

    private $client;

    /**
     * BaseStub constructor.
     * @param $hostname
     * @param $opts
     * @param $channel
     */
    public function __construct($hostname, $opts, $channel)
    {
        $this->hostname = $hostname;
        $hostname = explode(":", $hostname);
        $this->host = $hostname[0];
        $this->port = $hostname[1];
        $this->client = new \http2_client($this->host, $this->port, false);
    }

    public function connect($timeout, $callback)
    {
        $this->client->connect($timeout, function($client, $errCode) use ($callback) {
            call_user_func($callback, $this, $errCode);
        });
    }

    public function close()
    {
        $this->client->close();
    }

    /**
     * Call a remote method that takes a single argument and has a
     * single output.
     *
     * @param string   $method      The name of the method to call
     * @param mixed    $argument    The argument to the method
     * @param callable $deserialize A function that deserializes the response
     * @param array    $metadata    A metadata map to send to the server
     *                              (optional)
     * @param array    $options     An array of options (optional)
     *
     * @return bool|UnaryCall
     */
    protected function _simpleRequest($method,
                                      $argument,
                                      $deserialize,
                                      array $metadata = [],
                                      array $options = [])
    {
        $call = new UnaryCall($deserialize);
        $msg = $argument->serializeToString();
        $data = pack('CN', 0, strlen($msg)) . $msg;
        if(!$this->client->post($method, $data, 3, [$call, 'onReceive']))
        {
            return false;
        }
        return $call;
    }

    /**
     * Call a remote method that takes a single argument and returns a stream
     * of responses.
     *
     * @param string   $method      The name of the method to call
     * @param mixed    $argument    The argument to the method
     * @param callable $deserialize A function that deserializes the responses
     * @param array    $metadata    A metadata map to send to the server
     *                              (optional)
     * @param array    $options     An array of options (optional)
     *
     * @return ServerStreamingCall The active call object
     */
    protected function _serverStreamRequest($method,
                                            $argument,
                                            $deserialize,
                                            array $metadata = [],
                                            array $options = [])
    {
        $call = new ServerStreamingCall($deserialize);
        $msg = $argument->serializeToString();
        $stream = $this->client->openStream($method);
        $call->setStream($stream);
        $data = pack('CN', 0, strlen($msg)) . $msg;
        $stream->push($data);
        return $call;
    }

    /**
     * Call a remote method with messages streaming in both directions.
     *
     * @param string $method The name of the method to call
     * @param callable $deserialize A function that deserializes the responses
     * @param array $metadata A metadata map to send to the server
     *                              (optional)
     * @param array $options An array of options (optional)
     * @return bool|BidiStreamingCall
     */
    protected function _bidiRequest($method,
                                    $deserialize,
                                    array $metadata = [],
                                    array $options = [])
    {
        $call = new BidiStreamingCall($deserialize);
        $stream = $this->client->openStream($method);
        if(!$stream)
        {
            return false;
        }
        $call->setStream($stream);
        return $call;
    }
}