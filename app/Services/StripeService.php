<?php

namespace App\Services;

use App\Interfaces\PaymentInterface;

class StripeService implements PaymentInterface
{
  public function pay(float $amount): string
  {
    return "From StripeService $amount";
  }
}
