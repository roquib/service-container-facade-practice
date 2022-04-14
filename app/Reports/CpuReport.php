<?php

namespace App\Reports;

use App\Services\ReportService;

class CpuReport extends ReportService
{
  public function handle()
  {
    echo "Report: CpuReport <br>";
  }
}
