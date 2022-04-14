<?php

namespace App\Abstracts;

abstract class Template
{
  public function make()
  {
    return $this
      ->addHotWater()
      ->addSugar()
      ->addPrimaryToppings()
      ->addMilk();
  }

  protected  function  addHotWater()
  {
    var_dump('Pour Hot water into cup');
    return $this;
  }

  protected  function addSugar()
  {
    var_dump('Add proper amount of sugar');
    return $this;
  }

  protected function addMilk()
  {
    var_dump('Add proper amount of Milk');
    return $this;
  }

  protected abstract function addPrimaryToppings();
}
