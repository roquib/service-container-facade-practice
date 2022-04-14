<?php

namespace App\Services;

use App\Interfaces\PaymentInterface;

class PaypalService implements PaymentInterface
{
  public function pay(float $amount): string
  {
    return "From PaypalService $amount";
  }
}
