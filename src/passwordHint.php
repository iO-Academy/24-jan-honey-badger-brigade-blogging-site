<?php

function passwordHint($password): string|null
{
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    } else {
        return null;
    }
}