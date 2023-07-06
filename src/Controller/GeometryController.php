<?php

namespace App\Controller;

use App\Model\Circle;
use App\Model\Triangle;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GeometryController
{
  private $defaultRadius;

  public function __construct(float $defaultRadius)
  {
    $this->defaultRadius = $defaultRadius;
  }
  /**
   * @Route("/circle/{radius}", name="circle")
   */
  public function circle(float $radius = null): JsonResponse
  {
    if ($radius === null) {
      $radius = $this->defaultRadius;
    }

    $circle = new Circle($radius);

    return $this->serializeShape($circle);
  }

  /**
   * @Route("/triangle/{a}/{b}/{c}", name="triangle")
   */
  public function triangle(float $a, float $b, float $c): JsonResponse
  {
    $triangle = new Triangle($a, $b, $c);

    return $this->serializeShape($triangle);
  }

  private function serializeShape($shape): JsonResponse
  {
    if ($shape instanceof Circle) {
      $type = 'circle';
      $radius = $shape->getRadius();
      $surface = $shape->calculateSurface();
      $circumference = $shape->calculateCircumference();
        
      // Check if the values are INF or NaN and handle them accordingly
      $radius = is_infinite($radius) || is_nan($radius) ? null : $radius;
      $surface = is_infinite($surface) || is_nan($surface) ? null : round($surface, 2);
      $circumference = is_infinite($circumference) || is_nan($circumference) ? null : round($circumference, 2);
    } elseif ($shape instanceof Triangle) {
      $type = 'triangle';
      $a = $shape->getA();
      $b = $shape->getB();
      $c = $shape->getC();
      $surface = $shape->calculateSurface();
      $perimeter = $shape->calculatePerimeter();

      // Check if the values are INF or NaN and handle them accordingly
      $a = is_infinite($a) || is_nan($a) ? null : round($a, 2);
      $b = is_infinite($b) || is_nan($b) ? null : round($b, 2);
      $c = is_infinite($c) || is_nan($c) ? null : round($c, 2);
      $surface = is_infinite($surface) || is_nan($surface) ? null : round($surface, 2);
      $perimeter = is_infinite($perimeter) || is_nan($perimeter) ? null : round($perimeter, 2);
    } else {
      throw new \InvalidArgumentException('Invalid shape provided.');
    }

    $responseData = [
      'type' => $type,
    ];

    if ($shape instanceof Circle) {
      $responseData['radius'] = $radius;
      $responseData['surface'] = $surface;
      $responseData['circumference'] = $circumference;
    } elseif ($shape instanceof Triangle) {
      $responseData['a'] = $a;
      $responseData['b'] = $b;
      $responseData['c'] = $c;
      $responseData['surface'] = $surface;
      $responseData['circumference'] = $perimeter;
    }

    return new JsonResponse($responseData);
  }
}
