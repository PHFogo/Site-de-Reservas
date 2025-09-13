<?php

namespace App\Enums;

enum BookingStatus: string
{
    case PENDENTE = 'PENDENTE';
    case CONFIRMADA = 'CONFIRMADA';
    case CANCELADA = 'CANCELADA';
}