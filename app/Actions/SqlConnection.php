<?php

namespace App\Actions;

use App\Contracts\DbConnectionInterface;

class SqlConnection implements DbConnectionInterface
{
  public function connect()
  {
    echo "Connect to SQL <br>";
  }
}
