<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'first_name',
        'middle_name',
        'birthday',
        'gender',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date'
    ];

    protected function birthday(): Attribute
    {
        return Attribute::get(fn ($value)=>Carbon::parse($value)->format('d M Y'));

    }

    public function getRoleNameAttribute(): string
    {
        return RoleEnum::list()[$this->role];
    }

    public function getGenderNameAttribute(): string
    {
        return GenderEnum::list()[$this->gender];
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function folders(): HasMany
    {
        return $this->hasMany(Folder::class);
    }

}
