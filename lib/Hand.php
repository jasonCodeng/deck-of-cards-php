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

        // first we sort the hand by value
        $this->sortByValue();

        // check for bad input length
        $handLength = count($this->hand);
        if ($length > $handLength || $length < 0) return false;

        //temp array to hold straight
        $tempHand = [];

        // loop through each card in hand for inputted length
        for ($i = 0; $i < $handLength; $i++) {
            for ($j = 0; $j < $length; $j++) {

                // get values of king/queen/jack
                $currentValueKey = array_search($this->hand[i], Card::$values);
                $nextValueKey = array_search($this->hand[i+1], Card::$values);

                // if correct card in for straight was found, add card to temp array and continue
                if ($currentValueKey + 1 === $nextValueKey) {
                    array_push($tempHand, $this->hand[i]->suit);
                    continue;
                }

                // next card was no correct card, reset straight temp hand and break out of current iteration of loop
                else {
                    $tempHand = [];
                    break;
                }

                // here, we check for a straight flush if specified to
                if ($sameSuit) {
                    //check if all suits in the array are the same as the first suit
                    if(array_unique($tempHand) === $tempHand[0]){
                        return true;
                    }
                    return false;
                }

                // we did not break out of loop, which means a straight of $length was found
                return true;
            }
        }
    }

    private function swap($a, $b) {
        $temp = $this->hand[$a];
        $this->hand[$a] = $this->hand[$b];
        $this->hand[$b] = $temp;
    }
}

?>
