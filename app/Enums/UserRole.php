<?php

namespace App\Enums;

enum UserRole: string
{
    case CLIENTE = 'CLIENTE';
    case ADMIN = 'ADMIN';
}