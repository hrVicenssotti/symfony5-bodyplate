<?php

namespace App\Infra\Repository;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    public function __construct(
        EntityManagerInterface $entityManager
    ) {
        parent::__construct(
            $entityManager,
            $entityManager->getClassMetadata(User::class)
        );
    }

    /**
     * Save a user.
     *
     * @param User $user
     * @return void
     */
    public function save(User $user): void
    {
        $entityManager = $this->getEntityManager();

        $entityManager->persist($user);
        $entityManager->flush();
    }

    /**
     * Delete a user.
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user): void
    {
        $entityManager = $this->getEntityManager();

        $entityManager->remove($user);
        $entityManager->flush();
    }
}
