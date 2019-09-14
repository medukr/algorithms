<?php
/**
 * Created by andrii
 * Date: 11.09.19
 * Time: 16:23
 */

namespace observer;

interface ObserverInterface
{
    public function update(EventInterface $event);
}