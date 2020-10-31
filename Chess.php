<?php

interface MoveBehavior {
    public function Move($currentPosition);
}

class MoveByOne implements MoveBehavior {
    public function Move($currentPosition) {return $currentPosition += 1;}
}

class MoveByTwo implements MoveBehavior {
    public function Move($currentPosition) {return $currentPosition += 2;}
}

class InheritanceSoldier extends MoveByOne
{
    public $Position;
    
    function __construct($Position) {
        $this->Position = $Position;
    }
    
    public function main()
    {
        $nextPosition = Move($this->Position);
        // do anything with nextPosition
    }
}

class CompositionSoldier
{
    public $Position;
    protected $_Moveable;

    public function SetMoveBahavaior($Moveable) { $this->_Moveable = $Moveable; }

    public function Move()
    {
        $nextPosition = $this->_Moveable.Move($this->Position);
        // do anything with nextPosition
    }
}

class Soldier extends CompositionSoldier
{
    public $someCondition;
    public $moveByOne;
    public $moveByTwo;
    
    function __construct() {
        $this->someCondition = true;
        
        $moveByOne = new MoveByOne();
        $moveByTwo = new MoveByTwo();
    }
    

    public function Main()
    {
        SetMoveBahavaior($moveByOne);
        Move();

        if ($this->someCondition) SetMoveBahavaior($moveByTwo);
        Move();
    }
}

?>
