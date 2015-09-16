<?php

class DummySoapClient
{

    protected $wsdl;

    protected $options;

    public function __construct($wsdl, $options)
    {
        $this->wsdl = $wsdl;
        $this->options = $options;
    }

    public function __getLastResponseHeader()
    {
        $headers = new stdClass();
        $headers->sessionId = 'dummyId';

        return $headers;
    }

    public function __call($method, $arguments)
    {
        $dummyClassName = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz') . 'Dummy';
        eval('class ' . $dummyClassName . ' { function __get($property) { return $property; } }');

        $body = new $dummyClassName();
        $body->wsdl = $this->wsdl;
        $body->options = $this->options;
        $body->method = $method;
        $body->arguments = $arguments;

        return $body;
    }

}

class DummySoapFactory
{

    protected $builds = [];

    /**
     * @param $wsdl
     * @param array $options
     * @return DummySoapClient
     */
    public function build($wsdl, $options = [])
    {
        $build = new DummySoapClient($wsdl, $options);

        $this->builds[] = $build;

        return $build;
    }

    public function getBuilds()
    {
        return $this->builds;
    }
}