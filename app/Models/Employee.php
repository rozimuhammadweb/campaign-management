<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $fathers_name
 * @property string $passport_number
 * @property string $position
 * @property string $address
 * @property string $phone_number
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $company_id
 * *
 * @property Company $company
 */
class Employee extends Model
{
    protected $fillable = [
        "last_name",
        "first_name",
        "fathers_name",
        "passport_number",
        "position",
        "phone_number",
        "address",
        "company_id",
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
