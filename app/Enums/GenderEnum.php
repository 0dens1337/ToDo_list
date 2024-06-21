<?php
namespace App\Enums;
use Illuminate\Support\Collection;

enum GenderEnum: int
{
    case MALE = 0;
    case FEMALE = 1;

    public function name(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }

    public static function list(): Collection
    {
        return collect(self::cases())->mapWithKeys(function ($role) {
            return [$role->value => $role->name()];
        });
    }
}
