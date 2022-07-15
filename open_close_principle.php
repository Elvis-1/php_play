<?php 

/* FOLLOWING THE SOLID PRINCIPLE FOR SOFTWARE DEVELOPMENT

SOLID stands for:

S - Single-responsiblity Principle
O - Open-closed Principle
L - Liskov Substitution Principle
I - Interface Segregation Principle
D - Dependency Inversion Principle


*/

// O - Open-closed Principle

/* Open-closed Principle (OCP) states:

Objects or entities should be open for extension but closed for modification.

*/

// Assume we have other shapes, we will have to modify the areasumcalculator class. Which is against the SOLID of Open-closed principle


// calculating the area of shapes


// Our aim here is to allow extension but avoid modifications to any class

// Inorder to ensure that all shapes provided have area method since we want to make area unique to each shape(object) because all shapes have different areas, we create an interface and an exception class.

 interface ShapeArea{
  public function area();

 }

class Square implements ShapeArea
{
    public $length;

     function __construct($length)
    {
      $this->length = $length;
    }
   
    public function area()
    {
      $area = $this->length * $this->length;
      return $area;
    }
    
}

class Circle implements ShapeArea{
    public $radius;
    
     function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function area()
    {
      $area = pi() * ($this->radius * $this->radius);
       return $area;
    }
}


class AreaSumCalculator{
    protected $shapes;
    
     public function __construct($shapes = [])
     {
     
       $this->shapes = $shapes;
     } 

    public function sum()
    {
        $area = [];
      foreach($this->shapes as $shape)
      {

           $area[] = $shape->area();  
      }
      return array_sum($area);
    }
   
}

class AreaSumCalculatorOutput{
    public $areasumcalculator;

   public function __construct(AreaSumCalculator $areasumcalculator)
    {
        $this->areasumcalculator = $areasumcalculator;
    }

    public function jsonOutput()
    {
      $data = [
        'sum' => $this->areasumcalculator->sum(),
      ];

      return json_encode($data);
    }
}

// create shapes or objects (instance of classes)
$circle = new Circle(10);
$square = new Square(5);


// create a shape variable to accept an array of the area of shapes (object created)

$shapes = [$circle, $square];

// calculate the sum of the areas of the shapes
$area_sum_calculator = new AreaSumCalculator($shapes);

// output the sum

$area_sum_output = new AreaSumCalculatorOutput($area_sum_calculator);

// call the output
$json_output = $area_sum_output->jsonOutput();

echo $json_output;
















