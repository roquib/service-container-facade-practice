<?php

namespace App\Actions;

use App\Contracts\Logger;

class LogToFile implements Logger
{
  public function log($message)
  {
    echo "Log to file: $message  <br>";
  }
}
