<?php

namespace App\Actions;

use App\Abstracts\Template;

class Tea extends Template
{
  public function addPrimaryToppings()
  {
    var_dump('Add proper amount of tea');
    return $this;
  }
}
