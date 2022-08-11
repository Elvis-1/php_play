<?php

/*
Dependency Inversion Principle

High level classes should not depend upon low level classes, both should depend on abstractions.

Abstractions should not depend on details, details should depend on abstractions.

*/

// Lets use a light bulb and button example

// class LightBulb{
//     protected bool $currentState =false;

//  public function turnOn()
//     {
//         $this->currentState = true;
//     }
//     public function turnOff()
//     {
//         $this->currentState = false;
//     }

//     public function getCurrentState():string
//     {
//         if($this->currentState)
//         {
//             return 'on';
//         }else{
//             return 'off';
//         }
       
//     }
// }

// class Button {
//     public LightBulb $lamp;

//     function __construct(LightBulb $lamp)
//     {
//         $this->lamp = $lamp;
//     }

//     public function buttonOn()
//     {
//        return $this->lamp->turnOn();
//     }

//     public function buttonOff()
//     {
//         return $this->lamp->turnOff();
//     }

//     public function buttonState()
//     {   
//         //echo 'got here';
//         return $this->lamp->getCurrentState();
//     }
// }

// $bulb = new LightBulb();
// $button = new Button($bulb);
// $button->buttonOn();
// $button->buttonOff();
//  echo $button->buttonState();


// To ensure that the button class does not depend on the light buld, we create interface

interface LightInterface{
    public function turnOn();
    public function turnOff();
}

interface ButtonInterface{
    public function buttonOn();
    public function buttonOff();
}


class LightBulb implements LightInterface{
    protected bool $currentState =false;

 public function turnOn()
    {
        $this->currentState = true;
    }
    public function turnOff()
    {
        $this->currentState = false;
    }

    public function getCurrentState():string
    {
        if($this->currentState)
        {
            return 'on';
        }else{
            return 'off';
        }
       
    }
}

class States{
    private LightBulb $states;

    function __construct($states)
    {
$this->states = $states;
    }

    
}


class Button implements ButtonInterface{
    public LightInterface $lamp;

    function __construct(LightInterface $lamp)
    {
        $this->lamp = $lamp;
    }

    public function buttonOn()
    {
       return $this->lamp->turnOn();
    }

    public function buttonOff()
    {
        return $this->lamp->turnOff();
    }

    public function buttonState()
    {   
    //echo 'got here';
        return $this->lamp->getCurrentState();
    }
}


$bulb = new LightBulb();
$button = new Button($bulb);
$button->buttonOn();
//$button->buttonOff();
 echo $button->buttonState();









