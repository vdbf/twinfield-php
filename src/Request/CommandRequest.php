<?php namespace Vdbf\Components\Twinfield\Request;

use Vdbf\Components\Twinfield\Command;
use Vdbf\Components\Twinfield\Request;

class CommandRequest extends Request
{

    /**
     * @var Command
     */
    protected $command;

    /**
     * @param $sessionId
     * @param Command $command
     */
    public function __construct($sessionId, Command $command)
    {
        parent::__construct($sessionId);

        $this->command = $command;
    }

}