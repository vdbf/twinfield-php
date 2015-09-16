<?php

class ApiClientTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Vdbf\Components\Twinfield\ApiClient
     */
    protected $sut;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var DummySoapFactory
     */
    protected $factory;

    public function setUp()
    {
        $this->factory = new DummySoapFactory();
        $this->options = ['user' => 'vdbf', 'password' => '12345', 'organisation' => 'vdbf-org'];
        $this->sut = new \Vdbf\Components\Twinfield\ApiClient($this->factory, $this->options);
    }

    public function testResourceBuilding()
    {
        $session = $this->sut->resource('Session');
        $this->assertInstanceOf('\\Vdbf\\Components\\Twinfield\\Resource\\Session', $session);

        //try to build a non-existent resource
        $this->setExpectedException('\\Vdbf\\Components\\Twinfield\\Exception\\UnknownResource');
        $this->sut->resource('NonExistent');
    }

    public function testAuthentication()
    {
        $this->sut->authenticate();

        $builds = $this->factory->getBuilds();

        $this->assertCount(1, $builds);
    }

}