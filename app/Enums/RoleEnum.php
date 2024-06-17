<?php
namespace App\Enums;

use Illuminate\Support\Collection;

enum RoleEnum: int
{
    case ADMIN = 0;
    case USER = 1;

    public function name(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::USER => 'User',
        };
    }

    public static function list(): Collection
    {
        return collect(self::cases())->mapWithKeys(function ($role) {
            return [$role->value => $role->name()];
        });
    }
}


