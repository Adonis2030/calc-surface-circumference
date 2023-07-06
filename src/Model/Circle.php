<?php

namespace App\Model;

class Circle
{
  private $radius;

  public function __construct(float $radius)
  {
    $this->radius = $radius;
  }

  public function calculateSurface(): float
  {
    return pi() * $this->radius * $this->radius;
  }

  public function calculateCircumference(): float
  {
    return 2 * pi() * $this->radius;
  }

  public function getRadius(): float
  {
    return $this->radius;
  }
}
