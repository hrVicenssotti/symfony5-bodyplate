<?php

namespace App\Application\Model;

class UserModel
{
    private ?int $id;
    private ?string $email;
    private array $roles;
    private ?string $password;

    public function __construct(?int $id, ?string $email, array $roles, ?string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->roles = $roles;
        $this->password = $password;
    }

    public static function createFromArray(array $data): self
    {
        return new self(
            null,
            $data['email'],
            ['ROLE_USER'],
            $data['password'],
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}
