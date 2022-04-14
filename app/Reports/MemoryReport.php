<?php

namespace App\Reports;

use App\Services\ReportService;

class MemoryReport extends ReportService
{
  public function handle()
  {
    echo "Report: MemoryReport <br>";
  }
}
