<?php namespace Vdbf\Components\Twinfield;

use SoapClient;

class Response
{

    protected $body;

    protected $headers;

    /**
     * Response constructor.
     * @param $body
     * @param $header
     */
    public function __construct($body, $headers)
    {
        $this->body = $body;
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @param mixed $header
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param SoapClient $client
     */
    public static function fromSoapClient(SoapClient $client)
    {
        $body = $client->__getLastResponse();
        $headers = $client->__getLastResponseHeaders();

        return new static($body, $headers);
    }

}