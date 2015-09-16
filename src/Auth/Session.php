<?php namespace Vdbf\Components\Twinfield\Auth;

class Session
{

    protected $sessionId;

    protected $cluster;

    protected $nextAction;

    /**
     * Session constructor.
     * @param string $sessionId
     * @param string $cluster
     * @param string $nextAction
     */
    public function __construct($sessionId, $cluster, $nextAction)
    {
        $this->sessionId = $sessionId;
        $this->cluster = $cluster;
        $this->nextAction = $nextAction;
    }

    /**
     * @return string|null
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @return string|null
     */
    public function getCluster()
    {
        return $this->cluster;
    }

    /**
     * @return string|null
     */
    public function getNextAction()
    {
        return $this->nextAction;
    }


}