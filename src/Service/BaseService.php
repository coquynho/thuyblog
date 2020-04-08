<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class BaseService
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManagerInterface;

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        EventDispatcherInterface $dispatcher
    ) {
        $this->entityManagerInterface = $entityManagerInterface;
        $this->dispatcher = $dispatcher;
    }
}