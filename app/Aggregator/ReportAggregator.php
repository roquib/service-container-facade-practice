<?php

namespace App\Aggregator;

use App\Services\ReportService;

class ReportAggregator
{
  protected $reports = [];
  public function __construct(ReportService ...$reports)
  {
    $this->reports = $reports;
  }
  public function aggregate()
  {
    foreach ($this->reports as $report) {
      $report->handle();
    }
  }
}
