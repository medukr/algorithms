<?php
include '../vendor/autoload.php';


use observer\FootballFan;
use observer\FootballTeam;

$team1 = new FootballTeam('Задиры');

$fan1 = new FootballFan('Герман');
$fan2 = new FootballFan("Владлен");

$team1->attachObserver($fan1);
$team1->attachObserver($fan2);

$team1->goalAction();
$team1->goalEnemyAction();

$team1->detachObserver($fan1);

$team1->fightAction();

$fan3 = new FootballFan('Гарри топор');
$team1->attachObserver($fan3);

$team1->fightAction();