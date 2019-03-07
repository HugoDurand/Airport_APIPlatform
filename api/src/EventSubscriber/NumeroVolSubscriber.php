<?php
// api/src/EventSubscriber/BookMailSubscriber.php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Vols;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class NumeroVolSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['createNumber', EventPriorities::PRE_VALIDATE],
        ];
    }

    public function createNumber(GetResponseForControllerResultEvent $event)
    {
        $vol = $event->getControllerResult();

        if (!$vol instanceof Vols) {
            return;
        }
        $number = md5(uniqid(rand(), true));

        $vol->setNumero($number);
    }
}
