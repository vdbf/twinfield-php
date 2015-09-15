<?php namespace Vdbf\Components\Twinfield;

use ReflectionClass;
use Vdbf\Components\Twinfield\Exception\UnknownResource;

class ApiClient
{

    /**
     * @var string
     */
    protected $sessionId;

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @return void
     */
    public function authenticate()
    {
        //do oauth logon
    }

    /**
     * @return void
     */
    public function process()
    {

    }

    /**
     * @return \SimpleXmlElement
     */
    public function query()
    {

    }

    /**
     * Build a resource and inject the API client
     *
     * @param $resourceIdentifier
     * @return Resource
     */
    public function resource($resourceIdentifier)
    {
        $resourceClass = __NAMESPACE__ . '\\Resource\\' . $resourceIdentifier;

        if (!class_exists($resourceClass)) throw new UnknownResource($resourceIdentifier);

        return (new ReflectionClass($resourceClass))->newInstanceArgs([$this]);
    }


}