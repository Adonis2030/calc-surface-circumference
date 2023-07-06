# circleAndTriangle

I.) calculate surface
II.) calculate diameter

- create routes:
  [GET] /triangle/{a}/{b}/{c}
  [GET] /circle/{radius}
- routes must return JSON with serialized objects and calculated surfaces and diameters. For example:
  {
  "type": "circle",
  "radius": 2.0,
  "surface": 12.56,
  "circumference": 12.56,
  }
  or
  {
  "type": "triangle",
  "a": 3.0,
  "b": 4.0,
  "c": 5.0,
  "surface": 6.0,
  "circumference": 12.0,
  }
- create service/or similar structure for the given framework (for example app.geometry_calculator)
- implement method for sum of areas for two given objects
- implement method for sum of diameters for two given objects
