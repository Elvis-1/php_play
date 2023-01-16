<?php 
// WRONG APPROACH

interface CalculatorOperation {

} 

class Addition implements CalculatorOperation {
    private $left;
    private $right;
    private $result = 0.0;

    public function __construct($left, $right) {
      $this->left = $left;
      $this->right = $right;
    }
}

class Subtraction implements CalculatorOperation {
    private $left;
    private $right;
    private $result = 0.0;

    function  __construct($left, $right) {
      $this->left = $left;
      $this->right = $right;
    }
}

class Multiplication implements CalculatorOperation {
    private $left;
    private $right;
    private $result = 0.0;

    public  function __construct($left, $right) {
      $this->left = $left;
      $this->right = $right;
    }
}

class Division implements CalculatorOperation {
    private $left;
    private $right;
    private $result = 0.0;

    public function __construct($left, $right) {
      $this->left = $left;
      $this->right = $right;
    }
}

class Calculator {
    private $operation;

    public  function __construct(CalculatorOperation $operation) {
    if(!$operation){
      throw new \Exception('Can not perform operation');
        }
        $this->operation = $operation;
    }

   public function calculate(){
      if($this->operation instanceOf Addition){
         $this->operation->result = $this->operation->left + $this->operation->right;
      } else if($this->operation instanceOf Subtraction){
     $this->operation->result = $this->operation->left - $this->operation->right;
      } else if($this->operation instanceOf Multiplication){
         $this->operation->result = $this->operation->left * $this->operation->right;
      } else if($this->operation instanceOf Divison){
         if($this->operation->right === 0){
           throw new \Exception("Can't divide by 0");
         }
         $this->operation->result = $this->operation->left / $this->operation->right;
      }
    return $this->operation->result;
   }
}


// RIGHT WAY

interface CalculatorOperation {
    public function perform();
} 

class Addition implements CalculatorOperation {
    private $left;
    private $right;
    private $result = 0.0;

    public function __construct($left, $right) {
      $this->left = $left;
      $this->right = $right;
    }

    public function perform(): void {
      $this->result = $this->left + $this->right;
    }
}

class Subtraction implements CalculatorOperation {
    private $left;
    private $right;
    private $result = 0.0;

    public function __construct($left, $right) {
      $this->left = $left;
      $this->right = $right;
    }

    public function perform(): void {
      $this->result = $this->left - $this->right;
    }
}

class Multiplication implements CalculatorOperation {
    private $left;
    private $right;
    private $result = 0.0;

    public  function __construct($left, $right) {
      $this->left = $left;
      $this->right = $right;
    }

    public function perform(): void {
      $this->result = $this->left * $this->right;
    }
}

class Divison implements CalculatorOperation {
    private $left;
    private $right;
    private $result = 0.0;

    public function __construct($left, $right) {
      $this->left = $left;
      $this->right = $right;
    }

    public function perform(): void {
      if($this->right === 0){
           throw new \Exception("Can't divide by 0");
        }
      $this->result = $this->left / $this->right;
    }
}

