<?php

namespace App\Http\Controllers;

use App\Contracts\Logger;

class UsersController
{
  protected $logger;

  public function __construct(Logger $logger)
  {
    $this->logger = $logger;
  }

  public function show()
  {
    $this->logger->log('User list');
  }
}
