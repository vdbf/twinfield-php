<?php namespace Vdbf\Components\Twinfield;

class Request
{

    /**
     * @var string
     */
    protected $sessionId;

    /**
     * Request constructor.
     * @param $sessionId
     */
    public function __construct($sessionId)
    {
        $this->sessionId = $sessionId;
    }


}