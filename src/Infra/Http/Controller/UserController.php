<?php

namespace App\Infra\Http\Controller;

use App\Application\Model\UserModel;
use App\Domain\Service\UserService;
use App\Request\UserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    public function __construct(
        private UserService $userService,
        protected ValidatorInterface $validator,
    ) {
    }

    /**
     * Create user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $userRequest = UserRequest::create($this->validator);
        $userRequest->validate();

        $userModel = UserModel::createFromArray($data);
        $this->userService->createUser($userModel);

        return $this->json(['message' => 'User created'], 201);
    }

    /**
     * List users
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $users = $this->userService->listUsers();

        return $this->json($users);
    }

    /**
     * Get user by id
     *
     * @param int $id
     * @return JsonResponse
     */
    public function view(int $id): JsonResponse
    {
        $user = $this->userService->findUserById($id);

        return $this->json($user);
    }

    /**
     * Delete user by id
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $user = $this->userService->findUserById($id);

        if (!$user) {
            return $this->json(['message' => 'User not found'], 404);
        }

        $this->userService->deleteUser($user);

        return $this->json(['message' => 'User deleted']);
    }
}
