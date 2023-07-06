<?php

namespace App\Model;

class Triangle
{
  private $a;
  private $b;
  private $c;

  public function __construct($a, $b, $c)
  {
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
  }

  public function getA()
  {
    return $this->a;
  }

  public function getB()
  {
    return $this->b;
  }

  public function getC()
  {
    return $this->c;
  }

  public function calculateSurface()
  {
    // Calculate and return the surface area of the triangle
    $s = ($this->a + $this->b + $this->c) / 2;
    return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
  }

  public function calculatePerimeter()
  {
    // Calculate and return the perimeter of the triangle
    return $this->a + $this->b + $this->c;
  }
}
