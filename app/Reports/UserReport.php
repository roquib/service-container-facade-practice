<?php

namespace App\Reports;

use App\Repositories\DbOrderRepository;

class UserReport
{
  /**
   * Generate a new user report.
   *
   * @param  \App\Repositories\DbOrderRepository  $repository
   * @return array
   */
  public function generate(DbOrderRepository $repository)
  {
    return  $repository->getAll();
  }
}
