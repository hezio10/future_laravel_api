<?php

namespace App\Models;

enum ContactStatus : string
{
    case Active = 'active';
    case Blocked = 'blocked';
    case Deleted = 'deleted';
}