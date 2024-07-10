<?php

namespace App\Application\Service;

use App\Application\Model\UserModel;
use App\Domain\Entity\User;

class UserModelConverter
{
    public static function toEntity(UserModel $userModel): User
    {
        $user = new User();
        $user->setEmail($userModel->getEmail());
        $user->setRoles($userModel->getRoles());
        $user->setPassword($userModel->getPassword());
        return $user;
    }

    public static function updateEntityFromModel(User $user, UserModel $userModel): void
    {
        $user->setEmail($userModel->getEmail());
        $user->setRoles($userModel->getRoles());
        $user->setPassword($userModel->getPassword());
    }

    public static function toModel(User $user): UserModel
    {
        return new UserModel(
            $user->getId(),
            $user->getEmail(),
            $user->getRoles(),
            $user->getPassword()
        );
    }
}
