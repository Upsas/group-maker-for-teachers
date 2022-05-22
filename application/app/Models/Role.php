<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const ROLE_TEACHER = 'teacher';
    public const ROLE_ADMIN = 'admin';

    public const ROLES = [
        self::ROLE_TEACHER => 1,
        self::ROLE_ADMIN => 2
    ];
}
