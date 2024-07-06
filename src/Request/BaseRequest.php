<?php

namespace App\Request;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class BaseRequest
{
    public function __construct(
        protected ValidatorInterface $validator
    ) {
        $this->populate();
    }

    /**
     * Create a new request.
     */
    public static function create(ValidatorInterface $validator): static
    {
        return new static($validator);
    }

    /**
     * Validate the request.
     */
    public function validate(): array | bool
    {
        $errors = $this->validator->validate($this);

        $messages = [];

        /** @var \Symfony\Component\Validator\ConstraintViolation  */
        foreach ($errors as $message) {
            $messages[] = [
                'property' => $message->getPropertyPath(),
                'value' => $message->getInvalidValue(),
                'message' => $message->getMessage(),
            ];
        }

        if (count($messages) > 0) {
            throw new HttpException(Response::HTTP_BAD_REQUEST, json_encode($messages));
        }

        return true;
    }

    /**
     * Get the request.
     */
    public function getRequest(): Request
    {
        return Request::createFromGlobals();
    }

    /**
     * Populate the request.
     */
    protected function populate(): void
    {
        foreach ($this->getRequest()->toArray() as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }
}
