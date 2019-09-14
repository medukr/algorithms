<?php
/**
 * Created by andrii
 * Date: 11.09.19
 * Time: 16:40
 */

namespace observer;


class FootballTeam implements SubjectInterface
{

    private $observers;
    private $name;


    public function __construct($name)
    {
        $this->name = $name;
    }


    public function attachObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    public function detachObserver(ObserverInterface $observer)
    {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
            }
        }
    }


    public function getName()
    {
        return $this->name;
    }

    public function notify(EventInterface $event)
    {
        foreach ($this->observers as $obs){
            $obs->update($event);
        }
    }

    public function goalAction()
    {
        $event = new FootballEvent(FootballEvent::GOAL, $this);
        $this->notify($event);
    }

    public function goalEnemyAction()
    {
        $event = new FootballEvent(FootballEvent::GOAL_ENEMY, $this);
        $this->notify($event);
    }

    public function fightAction()
    {
        $event = new FootballEvent(FootballEvent::FIGHT, $this);
        $this->notify($event);
    }


}