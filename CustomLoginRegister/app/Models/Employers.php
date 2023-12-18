<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
    ];
    function EmployerContactInfo(): HasMany
    {
        return $this->hasMany(EmployersContactInfo::class, 'employer_id',);
    }
}
