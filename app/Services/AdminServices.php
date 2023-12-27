<?php

namespace App\Services;

interface AdminServices
{
        function login(string $username, string $password):bool;
}
