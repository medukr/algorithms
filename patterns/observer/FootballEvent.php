<?php
/**
 * Created by andrii
 * Date: 11.09.19
 * Time: 22:14
 */

namespace observer;


class FootballEvent implements EventInterface
{
    const GOAL = 'goal';
    const GOAL_ENEMY = 'goal_enemy';
    const FIGHT = 'fight';

    private $name;
    private $sender;


    public function __construct($name, FootballTeam $sender)
    {
        $this->name = $name;
        $this->sender = $sender;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSender()
    {
        return $this->sender;
    }
}