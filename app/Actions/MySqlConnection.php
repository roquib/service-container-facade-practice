<?php

namespace App\Actions;

use App\Contracts\DbConnectionInterface;

class MySqlConnection implements DbConnectionInterface
{
  public function connect()
  {
    echo "Connect to MySQL <br>";
  }
}
