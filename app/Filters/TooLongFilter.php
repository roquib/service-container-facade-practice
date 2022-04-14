<?php

namespace App\Filters;

use App\Services\FilterService;

class TooLongFilter extends FilterService
{
  public function handle()
  {
    echo "Filter: TooLongFilter <br>";
  }
}
