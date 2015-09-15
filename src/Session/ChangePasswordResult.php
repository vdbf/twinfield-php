<?php namespace Vdbf\Components\Twinfield\Session;

class ChangePasswordResult
{

    /**
     * Success
     */
    const Ok = 0;

    /**
     * Current password is invalid
     */
    const Invalid = 1;

    /**
     * Current and new password do not differ
     */
    const NotDifferent = 2;

    /**
     * The password is not secure
     */
    const NotSecure = 3;

    /**
     * Logon is disabled, current password was invalid too many times
     */
    const Disabled = 4;

    /**
     * @var LogonAction
     */
    protected $nextLogon;

    /**
     * ChangePasswordResult constructor.
     * @param LogonAction $nextLogon
     */
    public function __construct(LogonAction $nextLogon)
    {
        $this->nextLogon = $nextLogon;
    }


}