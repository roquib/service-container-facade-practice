<?php

namespace App\Filters;

use App\Services\FilterService;

class NullFilter extends FilterService
{
  public function handle()
  {
    echo "Filter: NullFilter <br>";
  }
}
