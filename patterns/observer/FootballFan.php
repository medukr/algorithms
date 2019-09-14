<?php
/**
 * Created by andrii
 * Date: 11.09.19
 * Time: 17:09
 */

namespace observer;


class FootballFan implements ObserverInterface
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function update(EventInterface $event)
    {
        switch ($event->getName()) {
            case FootballEvent::GOAL:
                printf("Гол!!! %s скандирует речевку!\n", $this->getName());
                break;
            case  FootballEvent::GOAL_ENEMY:
                printf("Нам забили гол. %s кричит судью на мыло!\n", $this->getName());
                break;
            case FootballEvent::FIGHT:
                printf("%s ломает стул и бъет по голове соседа\n", $this->getName());
                break;
            default:
                printf("%s и команда %s в замешательстве...\n", $this->getName(), $event->getSender()->getName());
        }


    }
}