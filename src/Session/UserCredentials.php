<?php namespace Vdbf\Components\Twinfield\Session;

class UserCredentials
{

    protected $user;

    protected $password;

    protected $organisation;

    /**
     * Credentials constructor.
     * @param $user
     * @param $password
     * @param $organisation
     */
    public function __construct($user, $password, $organisation)
    {
        $this->user = $user;
        $this->password = $password;
        $this->organisation = $organisation;
    }


}