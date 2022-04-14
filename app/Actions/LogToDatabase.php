<?php

namespace App\Actions;

use App\Contracts\Logger;

class LogToDatabase implements Logger
{
  public function log($message)
  {
    echo "Log to database: $message <br>";
  }
}
