<?php

namespace App;

use App\Contracts\Logger;
use App\Services\FilterService;

class Firewall
{
  /**
   * The logger instance.
   *
   * @var \App\Contracts\Logger
   */
  protected $logger;

  /**
   * The filter instances.
   *
   * @var array
   */
  protected $filters;

  /**
   * Create a new class instance.
   *
   * @param  \App\Contracts\Logger  $logger
   * @param  array  $filters
   * @return void
   */
  public function __construct(Logger $logger, FilterService ...$filters)
  {
    $this->logger = $logger;
    $this->filters = $filters;
  }

  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   */
  public function show($filter)
  {
    $this->logger->log('Filter: ' . $filter);

    try {
      $this->filters[$filter]->handle();
    } catch (\Exception $e) {
      $this->logger->log('Filter: ' . $e->getMessage());
    }
  }
}
