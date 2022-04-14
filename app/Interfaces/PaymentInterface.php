<?php

namespace App\Interfaces;

interface PaymentInterface
{
  /**
   * @param float $amount 
   * @return mixed 
   */
  public function pay(float $amount): string;
}
