<?php
readonly class Email
{
    public string $email;
    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Sorry this is not a valid email');
        }

        $this->email = $email;
    }
    public function __toString(): string
    {
        return $this->email;
    }


}
