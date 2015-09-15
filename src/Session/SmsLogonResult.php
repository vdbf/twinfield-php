<?php namespace Vdbf\Components\Twinfield\Session;

class SmsLogonResult
{

    /**
     * Logon successful
     */
    const Ok = 0;

    /**
     * Logon invalid
     */
    const Invalid = 1;

    /**
     * Logon timed out
     */
    const TimeOut = 2;

    /**
     * Logon is disabled, sms logon was invalid too many times
     */
    const Disabled = 3;

}