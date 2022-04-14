<?php

namespace App\Filters;

use App\Services\FilterService;

class ProfanityFilter extends FilterService
{
  public function handle()
  {
    echo "Filter: ProfanityFilter <br>";
  }
}
