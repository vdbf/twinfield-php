<?php

class ApiClientTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var \Vdbf\Components\Twinfield\ApiClient
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new \Vdbf\Components\Twinfield\ApiClient();
    }

    public function testResourceBuilding()
    {
        $session = $this->sut->resource('Session');
        $this->assertInstanceOf('\\Vdbf\\Components\\Twinfield\\Resource\\Session', $session);

        //try to build a non-existent resource
        $this->setExpectedException('\\Vdbf\\Components\\Twinfield\\Exception\\UnknownResource');
        $this->sut->resource('NonExistent');
    }

}