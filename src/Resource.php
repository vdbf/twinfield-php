<?php namespace Vdbf\Components\Twinfield;

class Resource
{

    /**
     * @var ApiClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $resourceUrl;

    /**
     * @param ApiClient $client
     */
    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getResourceUrl()
    {
        return $this->resourceUrl;
    }

    /**
     * @return ApiClient
     */
    public function getClient()
    {
        return $this->client;
    }

}