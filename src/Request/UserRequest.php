<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints as Assert;

class UserRequest extends BaseRequest
{
    /**
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=8)
     */
    public $password;
}
