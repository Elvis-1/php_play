<?php

// FOURTH 'SOLID' principle

/*

Interface Segregation Principle

Interface Segregation Principle states:

A client should never be forced to implement an interface that it doesn’t use, or clients shouldn’t be forced to depend on methods they do not use.

*/


// lets do a little modification. Paradventure, we want to calculate surface area and volume of solid shapes. For type-hint, we will create another interface to return a particular, so that all shapes created will be forced to return thesesame type

   // to constrain all shapes to use area method, we create an interface
interface ShapeArea{
    public function area();
   }

   // to constrain all solids to use volume method, we create an interface

   interface SolidVolume{
     public function volume();
     
   }

   interface ManageAllShapes{
    
    public function calculate():float;
   }

 // create an exception incase if the shape or the volume does not implement the methods available
 
 class NotValidShapeException extends Exception{
    
  public $shape;

  function __construct($shape){
    $this->shape = $shape;
  }

  public function message()
  {
    
    return   'Shape must implement the provided interface';
  }
 }

 class Cone implements ShapeArea, SolidVolume, ManageAllShapes{
// V=π(r)^2 * h/3 = cone

    private $radius;
    private $height;
    
    function __construct($radius,$height){
    $this->radius = $radius;
    $this->height = $height;
    }

    public function volume()
    {
      $volume = pi()* pow($this->radius,2) * ($this->height/3);
     
        return $volume;
    }

    public function area()
    {
     // A=πr(r+h2+r2) -- surface area of a cone
     
     $area = pi()* $this->radius *($this->radius + sqrt(pow($this->height,2)+ pow($this->radius,2)));

     return $area;
     
    }

    public function calculate():float
    {
        $sum = $this->volume() + $this->area();

        return $sum;
    }
 }

  class Square implements ShapeArea,ManageAllShapes
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

      public function calculate():float
      {
        return $this->area();
      }
      
  }
  
  class Circle implements ShapeArea, ManageAllShapes{
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

      public function calculate():float
      {
        return $this->area();
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
            if(is_a($shape, 'ManageAllShapes'))
            {
              $area[] = $shape->calculate();
            }else{
              throw new NotValidShapeException($shape);
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

  // create a subclass that can replace the base or parent class, this meets the LSP principle

  

  class VolumeSumCalculator extends AreaSumCalculator
  {
    public $shapes;
    function __construct($shapes = [])
    {
     // parent::__construct($shapes);

       $this->shapes = $shapes;
    }

    public function sum()
    {
      $area = [];
        foreach($this->shapes as $shape)
        {
          if(is_a($shape, 'ManageAllShapes'))
          {
            $area[] = $shape->calculate();
          }else{
            throw new NotValidShapeException($shape);
          }
          
        }

        return array_sum($area);
    }
    
  }
  
  
  // create shapes or objects (instance of classes)
  $circle = new Circle(10);
  $square = new Square(5);
  


  
  // create a shape variable to accept an array of the area of shapes (object created)
  
  $plane_shapes = [$circle, $square];
 
  
// Example 1

  try{
  // calculate the sum of the areas of the shapes
  $area_sum_calculator = new AreaSumCalculator($plane_shapes);

 
    // output the sum
  
    $area_sum_output = new AreaSumCalculatorOutput($area_sum_calculator);

      // call the output
  $json_output = $area_sum_output->jsonOutput();
 
  echo $json_output;  

  /*{
    "sum": 339.1592653589793
  }*/

  }catch(NotValidShapeException $e)
  {
   // echo 'wrong';
   echo $e->message();
  }

// Example 2

  // create solid shapes 
  $cone1 = new Cone(24,12);
  $cone2 = new Cone(20,40);

  $solid_shapes = [$cone1, $cone2];
  try{
 // calculate the sum of the volumes of the solid
 $volume_sum_calculator = new VolumeSumCalculator($solid_shapes);

     // output the sum
  
     $volume_sum_output = new AreaSumCalculatorOutput($volume_sum_calculator);

    // call the output
  $json_output =  $volume_sum_output->jsonOutput();
    //echo 'correct';
  echo $json_output;

  }catch(NotValidShapeException $e)
  {
   // echo 'wrong';
   echo $e->message();
  }
  
  

  

  
 
  
  
  












