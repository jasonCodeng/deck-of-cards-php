<?php

require_once('Card.php');

class Hand
{
    private $hand;

    function __construct() {
        $this->hand = array();
    }

    public function addCard($card) {
        array_push($this->hand, $card);
    }

    public function display() {
        print_r($this->hand);
    }

    public function sortBySuit() {
        $length = count($this->hand);
        for ($i = 1; $i < $length; $i++) {
            $temp = $this->hand[$i];
            $j = $i;
            while($j > 0 && ($temp->compareSuitThenValue($this->hand[$j-1]) < 0)) {
                $this->swap($j, $j-1);
                $j--;
            }
        }

    }

    public function sortByValue() {
        $length = count($this->hand);
        for ($i = 1; $i < $length; $i++) {
            $temp = $this->hand[$i];
            $j = $i;
            while($j > 0 && ($temp->compareValueThenSuit($this->hand[$j-1]) < 0)) {
                $this->swap($j, $j-1);
                $j--;
            }
        }
    }

    public function hasStraight($length, $sameSuit){

    }

    private function swap($a, $b) {
        $temp = $this->hand[$a];
        $this->hand[$a] = $this->hand[$b];
        $this->hand[$b] = $temp;
    }
}

?>
