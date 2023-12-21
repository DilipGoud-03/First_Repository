<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployersContactInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id',
        'name',
        'email',
    ];

    function Employers()
    {
        return $this->belongsTo(Employers::class);
    }
}
