<?php
readonly class User
{
    public int $id;
    public string $username;
    public Email $email;
    public string $password;

    public function __construct(int $id, string $username, string $password, Email $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
