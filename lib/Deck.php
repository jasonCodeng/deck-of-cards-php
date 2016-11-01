<?php

require_once('Card.php');
require_once('Hand.php');

class Deck
{
    private $deck;
    private $dealtCards;

    function __construct() {
        $this->dealtCards = [];
        $this->deck = $this::createDeck();
    }

    private static function createDeck() {
        $cards = [];
        foreach (Card::$suits as $suit) {
            foreach (Card::$values as $value) {
                $cards[] = new Card($suit, $value);
            }
        }
        return $cards;
    }

    public function dealOne() {
        if (empty($this->deck)) {
            throw new Exception('Deck is empty.');
        }
        $dealedCard = array_shift($this->deck);
        array_push($this->dealtCards, $dealedCard);
        return $dealedCard;
    }

    public function display() {
        foreach ($this->deck as $card) {
            echo '['.$card->value.' of '.$card->suit.']'.'.';
        }
        echo PHP_EOL;

        if (empty($this->dealtCards)) {
            echo 'There are no dealt Cards'.PHP_EOL;
        }
        else {
            foreach ($this->dealtCards as $card) {
                echo '['.$card->value.$card->suit.']'.'.'.PHP_EOL;
            }
        }
    }

    public function shuffle() {
        $length = count($this->deck);
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $i+1);
            $temp = $this->deck[$i];
            $this->deck[$i] = $this->deck[$rand];
            $this->deck[$rand] = $temp;
        }
    }
}

?>
