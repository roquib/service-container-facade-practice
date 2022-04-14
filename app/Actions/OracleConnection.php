<?php

namespace App\Actions;

use App\Contracts\DbConnectionInterface;

class OracleConnection implements DbConnectionInterface
{
  public function connect()
  {
    echo "Connect to Oracle <br>";
  }
}
