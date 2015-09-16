<?php namespace Vdbf\Components\Twinfield;

use ReflectionClass;
use Vdbf\Components\Twinfield\Auth\Session;
use Vdbf\Components\Twinfield\Exception\UnknownResource;

class ApiClient
{

    /**
     * @var Auth\Session
     */
    protected $session;

    /**
     * @var
     */
    protected $soapFactory;

    /**
     * @var array
     */
    protected $options;

    /**
     * ApiClient constructor.
     * @param $soapFactory
     * @param array $options
     */
    public function __construct($soapFactory, $options = [])
    {
        $this->soapFactory = $soapFactory;
        $this->options = array_merge($this->getDefaultOptions(), $options);
    }

    /**
     * @return Auth\Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return mixed
     */
    public function getSoapFactory()
    {
        return $this->soapFactory;
    }

    /**
     * @return void
     */
    public function authenticate()
    {
        if (is_null($this->getSession())) {

            $sessionResource = $this->resource('Session');

            /** @var Response $response */
            $response = $sessionResource->Logon($this->option('credentials', []));

            $responseBody = $response->getBody();

            $this->session = new Session(
                $response->getHeaders()->sessionId,
                $responseBody->cluster,
                $responseBody->nextAction
            );
        }
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

    /**
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [];
    }

    /**
     * @param string $key
     * @param mixed $defaultValue
     * @return mixed
     */
    public function option($key, $defaultValue = null)
    {
        return isset($this->options[$key]) ? $this->options[$key] : $defaultValue;
    }
}