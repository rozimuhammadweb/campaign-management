<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $head_fio
 * @property string $location
 * @property string $website
 * @property string $phone_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Company extends Model
{
    protected $fillable = [
        "name",
        "head_fio",
        "location",
        "email",
        "website",
        "phone_number",
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
