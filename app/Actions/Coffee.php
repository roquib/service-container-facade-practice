<?php

namespace App\Actions;

use App\Abstracts\Template;

class Coffee extends Template
{
  public function addPrimaryToppings()
  {
    var_dump('Add proper amount of Coffee');
    return $this;
  }
}
