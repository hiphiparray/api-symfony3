<?php

namespace Hip\User\Provider;

use Hip\AppBundle\Form\Handler\UserFormHandler;
use Hip\AppBundle\Provider\BaseProvider;
use Hip\AppBundle\Entity\User;
use Hip\User\Repository\UserRepository;

/**
 * Class UserProvider
 * @package Hip\User\Provider
 */
class UserProvider extends BaseProvider
{
    /**
     * UserProvider constructor.
     * @param UserRepository $userRepository
     * @param UserFormHandler $formHandler
     */
    public function __construct(UserRepository $userRepository, UserFormHandler $formHandler)
    {
        $this->repository = $userRepository;
        $this->formHandler = $formHandler;
        $this->object = new User();
    }
}
