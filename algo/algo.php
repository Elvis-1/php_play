<?php
class MyArray{
   public  $numbers = Array();
   
    

    public function addValuesToArray($val){
       $this->numbers = $val;
       
       return $this->numbers;
    }

    public function removeValuesFromArray(){
       
       if(!empty($this->numbers))
       {
        // print_r($this->numbers);
        $remove = array_pop($this->numbers);
        return $this->numbers;
       }else{
           return [];
       }
        
     }

    public function getArray(): Array{
        $array = [];
        print_r($this->numbers);
        if(!empty($this->numbers))
        {
           $array = $this->numbers;
          // print('not empty');
           return $array;
        }else{
            print('empty ');
            return [];
        }
    }
}

$newMyArray = new MyArray();
$addValuesToArray = $newMyArray->addValuesToArray([2,3,5,6]);
$romveValueFromArray = $newMyArray->removeValuesFromArray();
$getArray = $newMyArray->getArray();
print_r($getArray);