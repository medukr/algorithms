<?php
/**
 * Created by andrii
 * Date: 11.09.19
 * Time: 16:22
 */

namespace observer;

interface SubjectInterface
{
    public function attachObserver(ObserverInterface $observer);

    public function detachObserver(ObserverInterface $observer);

    public function notify(EventInterface $event);
}