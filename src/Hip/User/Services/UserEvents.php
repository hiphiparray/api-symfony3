<?php

namespace Hip\User\Services;

use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Hip\AppBundle\Entity\User;

/**
 * Class UserEvents
 * @package Hip\User\Services
 */
class UserEvents
{
    private $eventDispatcher;

    public function __construct(TraceableEventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param User $user
     * @param Request $request
     * @return null|Response
     */
    public function registrationInitialise(User $user, Request $request)
    {
        $event = new GetResponseUserEvent($user, $request);
        $this->eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        return $event->getResponse();
    }
}
