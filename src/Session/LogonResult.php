<?php namespace Vdbf\Components\Twinfield\Session;

class LogonResult
{
    /**
     * Success
     */
    const Ok = 0;

    /**
     * Logon blocked, system maintenance
     */
    const Blocked = 1;

    /**
     * Logon untrusted
     */
    const Untrusted = 2;

    /**
     * Logon invalid
     */
    const Invalid = 3;

    /**
     * User is deleted
     */
    const Deleted = 4;

    /**
     * User is disabled
     */
    const Disabled = 5;

    /**
     * Organisation is inactive
     */
    const OrganisationInactive = 6;

    /**
     * @var LogonAction
     */
    protected $logonAction;

    /**
     * @var string
     */
    protected $cluster;

    /**
     * LogonResult constructor.
     * @param LogonAction $logonAction
     * @param string $cluster
     */
    public function __construct(LogonAction $logonAction, $cluster)
    {
        $this->logonAction = $logonAction;
        $this->cluster = $cluster;
    }


}