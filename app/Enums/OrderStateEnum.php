<?php

namespace App\Enums;

enum OrderStateEnum
{
    case STARTED;
    case PROCESSING;
    case FINISHED;
}
