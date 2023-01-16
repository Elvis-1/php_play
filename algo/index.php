<?php
include_once 'array_class.php';
class Main{
       public function callArray(){
        $array_items = new ArrayClass(3);
        // insert values into the array
        $insert_values1 = $array_items->insert(5);
        $insert_values2 = $array_items->insert(4);
        $insert_values3 = $array_items->insert(6);
        $insert_values3 = $array_items->insert(7);
        $insert_values3 = $array_items->insert(8);

       // $remove_index = $array_items->removeAt(3);

        $search_item = $array_items->indexOf(8);
        // print the array
        $print = $array_items->print();          
       }
   
    
}

$call = new Main();
$call->callArray();