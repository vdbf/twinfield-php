<?php namespace Vdbf\Components\Twinfield\Request;

use Vdbf\Components\Twinfield\Query;
use Vdbf\Components\Twinfield\Request;

class QueryRequest extends Request
{

    /**
     * @var Query
     */
    protected $query;

    /**
     * @param $sessionId
     * @param Query $query
     */
    public function __construct($sessionId, Query $query)
    {
        parent::__construct($sessionId);

        $this->query = $query;
    }

}