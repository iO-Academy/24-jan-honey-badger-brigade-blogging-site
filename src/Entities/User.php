<?php
readonly class User
{
    public int $id;
    public string $username;
    public string $password;
    public string $email;

    public function __construct(int $id, string $username, string $password, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
