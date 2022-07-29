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

 // exception, incase a shape that does not implements our interface is provided.
 class InvalideShapeException extends Exception
 {
  public $message;

  function __construct($mess = 'Invalid shape')
  {
$this->message = $mess;
//return 'This shape is invalid';
  }

  public function getMyMessage()
  {
    return $this->message;
  }
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

// test our exception, lets create another shape that doesn't implement shapesurface

class Triangle{
  public $breadth;
  public $height;

  function __construct($breadth,$height)
  {
$this->breadth = $breadth;
$this->height = $height;
  }
   public function myArea()
   {
      $area = 1/2 * ($this->breadth * $this->height);

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
        if(is_a($shape, 'ShapeArea'))
        {
          $area[] = $shape->area();  
        }
        else{
          throw new InvalideShapeException;
        }
       

           
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

$triangle1 = new Triangle(10,23);
$triangle = new Triangle(1,23);


// create a shape variable to accept an array of the area of shapes (object created)

$shapes1 = [$circle, $square];
$shapes2 = [$triangle1, $triangle];

// calculate the sum of the areas of the shapes

try{
 
  $area_sum_calculator = new AreaSumCalculator($shapes1); 

  // answer :
/* {
  "sum": 339.1592653589793
}
*/


  // output the sum
$area_sum_output = new AreaSumCalculatorOutput($area_sum_calculator);

// call the output

$json_output = $area_sum_output->jsonOutput();

echo $json_output .'<br>'; 

}catch(InvalideShapeException $e)
{
  echo "Caught my exception\n";
  echo $e->getMyMessage();

}



// test the triangular shape

try{
 
  $area_sum_calculator = new AreaSumCalculator($shapes2); 

  // answer :
// Caught my exception Invalid shape


  // output the sum
$area_sum_output = new AreaSumCalculatorOutput($area_sum_calculator);

// call the output

$json_output = $area_sum_output->jsonOutput();

echo $json_output;

}catch(InvalideShapeException $e)
{
  echo "Caught my exception\n";
  echo $e->getMyMessage();

}



















