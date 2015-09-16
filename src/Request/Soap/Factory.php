<?php namespace Vdbf\Components\Twinfield\Request\Soap;

use SoapClient;

class Factory
{

    public function build($wsdl, $options = [])
    {
        return new SoapClient($wsdl, array_merge($options, ['trace' => true]));
    }

}