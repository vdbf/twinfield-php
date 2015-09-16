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

    /**
     * Build the base url for the resource
     *
     * @return string
     */
    public function buildBaseUrl()
    {
        $session = $this->client->getSession();

        if (is_null($session)) {
            return 'https://login.twinfield.com/webservices';
        }

        return $session->getCluster();
    }

    /**
     * Delegate the call from the resource to the Soap client
     *
     * @param $method
     * @param $arguments
     * @return Response
     */
    public function __call($method, $arguments)
    {
        $resourceUrl = $this->buildBaseUrl() . $this->getResourceUrl();

        $soapClient = $this->client->getSoapFactory()->build($resourceUrl);

        return new Response(
            $this->getResponseBody($soapClient, $method, $arguments),
            $this->getResponseHeaders($soapClient)
        );
    }

    /**
     * @param $client
     * @param $method
     * @param $arguments
     * @return \stdClass
     */
    protected function getResponseBody($client, $method, $arguments)
    {
        return call_user_func_array([$client, $method], $arguments);
    }

    /**
     * @param $client
     * @return \stdClass
     */
    protected function getResponseHeaders($client)
    {
        if (method_exists($client, 'getSoapClient')) {

            $decorated = $client->getSoapClient();

            return $decorated->__getLastResponseHeader();
        }

        return $client->__getLastResponseHeader();
    }

}