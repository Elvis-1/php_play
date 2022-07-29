<?php
function check_404($url) {
    $headers=get_headers($url, 1);
    if ($headers[0]!='HTTP/1.1 200 OK')
    {
echo 'true';
    }else{
        echo 'false';
    }
    
    
    
 }

//   $url ="https://drive.google.com/file/d/1ucL4rtqVH9ToSjmzZPUTacpVdxhpqNHZ/view?usp=sharing";

  $url = "https://drive.google.com/file/d/1lThBxA7lJoD9A-1thl0o2aTX9o_eM5C6/view?usp=sharing";

//  check_404('http://ifnotgod.com/images%5C/624e694621ca5-Prayers%20answered.jpg');
// https://drive.google.com/file/d/1lThBxA7lJoD9A-1thl0o2aTX9o_eM5C6/view?usp=sharing


 $segments = explode('/', parse_url($url, PHP_URL_PATH));

 print_r($segments);
  $drive_url_id = $segments[3];

 $ulr = "https://drive.google.com/uc?export=view&id=$drive_url_id";
 //print_r($segments); 
 //echo  $ulr;


 //The PHP var_dump() function returns the data type and value:

class BuzyDev{
    public $manager;
    public $staff;
    public $laptop;

    public function __construct($manager,$staff,$laptop){
          $this->staff = $staff;
          $this->laptop = $laptop;
          $this->manager = $manager;
    }

    public function message()
    {
       return $this->staff. ' and ' . $this->manager . ' are wonderful people.';
    }
}

$company = new BuzyDev('Kesms','Betty','HP');
echo '<br>';

// echo $company->message();

// var_dump(8.66);
// $x = 1;
// while($x < 6)
// {
//     echo $x;

//     $x++;
// }


// $persons = ['Bisi', 'Andrews','kess'];
// for ($x = 0; $x < count($persons); $x++) {
//     echo "The first person is: $persons[$x] <br>";
//   }
  
// for ($x = 0; $x < 20; $x++) {
//     if ($x%2 == 0 ) {
//         echo "The number is even: $x <br>";
//     }
//    // echo "The number is: $x <br>";
//   }

//   for ($x = 0; $x < 20; $x++) {
//     if ($x%2 == 0 ) {
//         continue;
//         //echo "The number is even: $x <br>";
//     }
//     echo "The number is: $x <br>";
//   }

//1,2,3,4,5,

// function sum(int $x, int $y) {
//     $z = $x + $y;
//     print $z;
//   }

//    sum(4,7);

// --- passing arguments by referrence

// function swap($arg1, $arg2){
//     echo "inside function before swapping: arg1=$arg1 arg2=$arg2\n";
//     echo '<br>';
//     $temp=$arg1;
//     $arg1=$arg2;
//     $arg2=$temp;
//     echo "inside function after swapping: arg1=$arg1 arg2=$arg2\n";
//     echo '<br>';
//  }
//  $arg1=10;
//  $arg2=20;
//  echo "before calling function : arg1=$arg1 arg2=$arg2\n";
//  echo '<br>';
//  swap($arg1, $arg2);
 //echo "after calling function : arg1=$arg1 arg2=$arg2\n"; // $arg1 and $arg2 is not changed, you have to pass it by referrence to change it

//  function swap(&$arg1, &$arg2){
//     echo "inside function before swapping: arg1=$arg1 arg2=$arg2\n";
//     $temp=$arg1;
//     $arg1=$arg2;
//     $arg2=$temp;
//     echo "inside function after swapping: arg1=$arg1 arg2=$arg2\n";
//  }
//  $arg1=10;
//  $arg2=20;
//  echo "before calling function : arg1=$arg1 arg2=$arg2\n";
//  swap($arg1, $arg2);
 //echo "after calling function : arg1=$arg1 arg2=$arg2\n";// $arg1 and $arg2 is changed,
 

//  $num = 2;
//  function add_five(&$value) {
//    global $num;
//    $num = $num + 2;
//    $value += 5;
//  }
 
 
//  add_five($num);
//  echo $num;

// $a = 10;
// $b = 20;
// $c=30;
// $arr = array(&$a, &$b, &$c);
// for ($i=0; $i<3; $i++)
// $arr[$i]++;
// echo "$a $b $c";


// ---- call back functions

//Pass a callback to PHP's array_map() function to calculate the length of every string in an array:


// function my_callback($item) {
//   return strlen($item);
// }

// $strings = ["apple", "orange", "banana", "coconut"];
// $lengths = array_map("my_callback", $strings);
// print_r($lengths);

// -- passing a function into another function as argument

// function exclaim($str) {
//     return $str . "! ";
//   }
  
//   function ask($str) {
//     return $str . "? ";
//   }
  
//   function printFormatted($str, $format) {
//     // Calling the $format callback function
//     echo $format($str);
//   }
  
//   // Pass "exclaim" and "ask" as callback functions to printFormatted()
//   printFormatted("Hello world", "exclaim");
//   printFormatted("Hello world", "ask");

// echo '3'. (print '5') + 7;
// function turing($x){
//     return function ($y) use ($x) {
//         return str_repeat($y,$x);
//     };
// }
// $a = turing(2);
// $b = turing(3);
// echo $a(3) .$b(2);


// ======= ======================///

//PHP program to find the difference
// between the sum of diagonal.

function difference($arr)
{
	$arr1 = array(array(1,2,3), array(1,5,6), array(1,2,3)); $two_dimensional_array = $arr1[0][0]; 
  // => 
    $arr2 = 
    array(
    array(array(1,2,3), array(1,5,6), array(1,2,3)),
     array(array(1,2,3), array(1,5,6), array(1,2,3)),
     array(array(1,2,3), array(1,5,6), array(1,2,3)),);

  $three_dimensional_array = $arr2[0][0][0];
  

  // my solution
  $d1 = 0; $d2 = 0;
  for($row = 0; $row < count($arr); $row++)
  {
    // index or position = total_length - num of rows
    // num of rows = total_length - index
       // lets confirm this formular with the two dimensional array
       // => first_position = 3 - 3 = 0 
       // => second_position = 3 - 2 = 1 
       // => third_position = 3 - 1 = 2 

       for($col = 0; $col < count($arr[$row]); $col++)
       {
        if($row == $col)               
        {          
            $d1 +=$arr[$row][$col];
        }

       if($row == (count($arr) - $col - 1))
       {
        $d2 += $arr[$row][$col];
       }
      }
       
    
  }

  $arr = abs($d1-$d2);

  return $arr;

}

// ================================  //

//echo difference(array(array(11, 2, 4), array(4, 5, 6), array(10, 8, -12)));

// ============================ /////

// This challenge introduces precision problems


function myplusMinus($arr) {
  // Write your code here
  //$arr1 = [1,1,0,-1,-1];

  $n = count($arr);
  $positive = 0;
  $negative = 0;
  $zero = 0;
  for($i = 0; $i < $n; $i++)
  {
      if($arr[$i] > -1 && $arr[$i] != 0)
      {
          $positive +=1;
      }
      
      if($arr[$i] < 1 && $arr[$i] != 0)
      {
          $negative += 1;
      }
      if($arr[$i] == 0)
      {
          $zero += 1;
      }
  }

  $ratio_of_positive = $positive/$n;
  $ratio_of_negative = $negative/$n;
  $ratio_of_zero = $zero/$n;
   
  function echo_six_decimal_digit($digit){
    $z = $digit;
    // round of to the nearest integer
    $z = $z * 1000000/1000000;
    // convert to string
    $str = "$z";
    // get digits from dots
    $get_digits_from_dot = strrchr($str, ".");
    // remove dots
    $remove_dot = substr($get_digits_from_dot,1);
    // check length of string
    $check_length_of_string = strlen($remove_dot);

    $a = 0;
    if($check_length_of_string == 1)
    {
      $a = $check_length_of_string + 5;
    }else{
      $a = 6;
    }

    $final = number_format($z,$a,'.');
    return $final;

  }
  print($ratio_of_positive);
  print("\n".$ratio_of_negative);
  print("\n".$ratio_of_zero);


}
//myplusMinus(array(-4, 3, -9, 0, 4, 1));


//===================//

// ====================//

// A stair case challenge

// function staircase($n)
// {
//   for($i = 0; $i<$n; $i++)
//   {
  
//     for($j=0; $j<$n-$j-1; $j++)
//     {
//       print(" ");
//     }
   
//     for($k = $i; $k>=0; $k--)
//     {
//       printf("#");
//     }
//     printf("\n");

//   }
// }

//  staircase(10);

$arr = [3,3,4,5,6,7,8];
// for($i=0; $i< count($arr); $i++)
// {
//   echo $i;
// }
// for($i=count($arr); $i >= 0; $i--)
// {
//   echo $i;
// }
$n = 1;
$f = [0,1];


// function stair($n)
// {
// for($i = 0; $i<$n; $i++){
//      for($j=0; $j<$n-$j-1; $j++)
//     {
//       print("");
//     }  
//   for($j = $i; $j>=0; $j-- ){
         
//     // print('#'); 

//      print("#". "\n" );
//   }

//   for($j = $n-$i-1; $j<$n; $j++ ){
         
//     print('#');  print("\n");
//  }
 // print("\n");
//   echo "<br>";
// }
// }

//stair(6);

$arr1 = [[2,3,4,5],[7,7,7,7],[8,8,8,8]];

$arr2 = [2,3,4,5];

for($i = 0; $i < count($arr2); $i++){
    print($arr2[$i]);
}

$i = 0;
$position = $n-1;



