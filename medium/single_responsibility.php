<?php 

/* FOLLOWING THE SOLID PRINCIPLE FOR SOFTWARE DEVELOPMENT

SOLID stands for:

S - Single-responsiblity Principle
O - Open-closed Principle
L - Liskov Substitution Principle
I - Interface Segregation Principle
D - Dependency Inversion Principle


*/

// S - Single-responsiblity Principle 
 // A class should have one and only one reason to change, meaning that a class should have only one job.

// calculating the area of shapes

class Square
{
    public $length;

     function __construct($length)
    {
      $this->length = $length;
    }
}

class Circle{
    public $radius;
    
     function __construct($radius)
    {
        $this->radius = $radius;
    }
}


class AreaSumCalculator{
    protected $shapes;
    
     public function __construct($shapes = [])
     {
        print_r($this->shapes);
       $this->shapes = $shapes;
     } 

    public function sum()
    {
        $area = [];
      foreach($this->shapes as $shape)
      {
         if(is_a($shape, 'Square'))
         {
            $area[] = $shape->length * $shape->length;
         }elseif(is_a($shape, 'Circle'))
         {
            $area[] = pi() * ($shape->radius * $shape->radius);
         }

        // return array_sum($area);
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

// create objects (instance of classes)
$circle = new Circle(10);
$square = new Square(5);

// create a shape variable to accept an array of shapes (object created)
$shapes = [$circle,$square];
//print_r($shapes);
// calculate the sum of the areas of the shapes
$area_sum_calculator = new AreaSumCalculator($shapes);

// output the sum

$area_sum_output = new AreaSumCalculatorOutput($area_sum_calculator);

// call the output
$json_output = $area_sum_output->jsonOutput();

//echo $json_output;


// O - Open-closed Principle

/* Open-closed Principle (OCP) states:

Objects or entities should be open for extension but closed for modification.

*/

// Assume we have other shapes, we will have to modify the areasumcalculator class. Which is against the SOLID of Open-closed principle














