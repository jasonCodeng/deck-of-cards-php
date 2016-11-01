<?php

require_once('lib/Deck.php');
require_once('lib/Card.php');
require_once('lib/Hand.php');

$Deck = new Deck();
$Deck->shuffle();

$Hand = new Hand();
$Hand2 = new Hand();

for($i = 0; $i <= 6; $i++) {
    $Hand->addCard($Deck->dealOne());
}

//$Hand->display();
$Hand->sortByValue();

echo $Hand->hasStraight(6,true);

?>
