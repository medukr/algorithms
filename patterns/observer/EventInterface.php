<?php
/**
 * Created by andrii
 * Date: 11.09.19
 * Time: 22:09
 */

namespace observer;

interface EventInterface
{

    public function getName();

    public function getSender();

}