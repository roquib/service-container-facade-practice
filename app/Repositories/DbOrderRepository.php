<?php

namespace App\Repositories;

use App\Contracts\OrderRepositoryInterface;

class DbOrderRepository implements OrderRepositoryInterface
{
  public function getAll()
  {
    return 'Getting all from mysql';
  }
}
