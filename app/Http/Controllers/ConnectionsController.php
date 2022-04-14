<?php

namespace App\Http\Controllers;

use App\Actions\OracleConnection;
use App\Contracts\DbConnectionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ConnectionsController extends Controller
{
    protected $connection;
    protected $dbconnection;
    function __construct(DbConnectionInterface $connection)
    {
        $this->connection = $connection;
        $this->dbconnection = App::make(DbConnectionInterface::class);
    }

    public function index()
    {
        $this->connection->connect();
    }
}
