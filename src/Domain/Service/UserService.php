<?php

namespace App\Domain\Service;

use App\Application\Model\UserModel;
use App\Application\Service\UserModelConverter;
use App\Domain\Entity\User;
use App\Infra\Repository\UserRepository;

class UserService
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    /**
     * Create a new user.
     *
     * @param UserModel $userModel The user model to create.
     *
     * @return User The created user.
     */
    public function createUser(UserModel $userModel): User
    {
        $user = UserModelConverter::toEntity($userModel);
        $this->userRepository->save($user);

        return $user;
    }

    /**
     * Find a user by its ID.
     *
     * @param int $id The ID of the user to find.
     *
     * @return User|null The user with the given ID, or null if not found.
     */
    public function findUserById(int $id): ?User
    {
        return $this->userRepository->find($id);
    }

    /**
     * List all users.
     *
     * @return User[] The list of users.
     */
    public function listUsers(): array
    {
        return $this->userRepository->findAll();
    }

    /**
     * Update a user.
     *
     * @param User $user The user to update.
     * @param UserModel $userModel The user model to update.
     *
     * @return User The updated user.
     */
    public function updateUser(User $user, UserModel $userModel): User
    {
        UserModelConverter::updateEntityFromModel($user, $userModel);
        $this->userRepository->save($user);

        return $user;
    }

    /**
     * Delete a user.
     *
     * @param User $user The user to delete.
     */
    public function deleteUser(User $user): void
    {
        $this->userRepository->delete($user);
    }
}
