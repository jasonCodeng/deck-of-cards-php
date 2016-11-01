<?php

class Card
{
    public $suit;
    public $value;

    public static $suits = [
        '0' => 'Clubs',
        '1' => 'Diamonds',
        '2' => 'Hearts',
        '3' => 'Spades'
    ];

    public static $values = [
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => 'Jack',
        '12' => 'Queen',
        '13' => 'King',
        '14' => 'Ace'
    ];

    function __construct($suit, $value) {
        $this->suit = $suit;
        $this->value = $value;
    }

    public function display() {
        echo $this->value.' of '.$this->suit;
    }

    public function compareSuit($card) {
        $currentSuitKey = array_search($this->suit, self::$suits);
        $otherSuitKey = array_search($card->suit, self::$suits);

        if($currentSuitKey < $otherSuitKey)
            return -1;
        else if ($currentSuitKey > $otherSuitKey)
            return 1;
        else
            return 0;
    }

    public function compareValue($card) {
        $currentValueKey = array_search($this->value, self::$values);
        $otherValueKey = array_search($card->value, self::$values);

        if($currentValueKey < $otherValueKey)
            return -1;
        else if ($currentValueKey > $otherValueKey)
            return 1;
        else
            return 0;
    }
}

?>
