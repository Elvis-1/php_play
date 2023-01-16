<?php

class ArrayClass {
   private $items  = Array();
    public $count_item;

   public function __construct(int $length) //2
   {
        $this->count_item = count($this->items);  // = 0
       // $this->count_item = $length;
       $this->items = [$length]; // = 2
   }

   public function insert($item) // 5
   {
    // if the array is full, resize
    if($this->items == $this->count_item)
    {
        // create a new array (twice the size of the initial array)
        $new_array = Array();
        print('it is working from here');
        $new_array = [$this->count_items * 2];
        // copy all the existing items
        for($i=0; $i < $this->count_item; $i++)
        {
            $new_array[$i] = $this->items[i]; 
        }
        // Set 'items' to this new array 
        $this->items = $new_array;
    }
    // add the new item at the end of the array
    $this->items[$this->count_item] = $item; // 5
    $this->count_item++; // 1
   // print("\n".$this->count_item. 'inside insert method');  // 1
   }

   public function removeAt(int $index)
   {
    // validate index
    if($index < 0 || $index >= $this->count_item)
    {
        throw new Exception('Wrong');
    }
    // shift the items to the left to fill the hole
    for($i=0; $i<$this->count_item; $i++)
    {
        $this->items[$i] = $this->items[$i + 1];
        $this->count_item--;
    }

   }

   public function indexOf(int $index)
   {
    // if we find it, return the index
    for($i=0; $i<$this->count_item; $i++)
    {
        if($this->items[$i] == $index)
        {
            return $i;
        }
        return -1;
    }
    // otherwise return -1
   }
   public function print(){
    //print('in print method'. "\n");
    for($i=0; $i < $this->count_item; $i++)
    {
        echo $this->items[$i]. "<br>";
    }
   }
}