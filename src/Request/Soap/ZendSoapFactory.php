<?php namespace Vdbf\Components\Twinfield\Request\Soap;

use Zend\Soap\Client;

class ZendSoapFactory
{

    public function build($wsdl, $options = [])
    {
        return new Client($wsdl, $options);
    }

}