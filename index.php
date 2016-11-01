<?php

require_once('lib/Deck.php');
require_once('lib/Card.php');
require_once('lib/Hand.php');

$Deck = new Deck();
$Deck->shuffle();
$Deck->display();

$Hand = new Hand();

for($i = 0; $i <= 50; $i++) {
    $Hand->addCard($Deck->dealOne());
}

$Hand->display();
$Hand->sortByValue();
$Hand->display();

?>
