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

        // compare suits for current card and other card
        if ($currentSuitKey < $otherSuitKey)
            return -1;
        else if ($currentSuitKey > $otherSuitKey)
            return 1;
        else
            return 0;
    }

    public function compareValue($card) {
        $currentValueKey = array_search($this->value, self::$values);
        $otherValueKey = array_search($card->value, self::$values);

        // compare values for current card and other card
        if ($currentValueKey < $otherValueKey)
            return -1;
        else if ($currentValueKey > $otherValueKey)
            return 1;
        else
            return 0;
    }

    public function compareSuitThenValue($card) {
        $result = $this->compareSuit($card);
        if ($result === 0) // if same suit was found, we check for value
            return $this->compareValue($card);
        else
            return $result;
    }

    public function compareValueThenSuit($card) {
        $result = $this->compareValue($card);
        if ($result === 0) // if same value was found, we check for suit
            return $this->compareSuit($card);
        else
            return $result;
    }
}

?>
