<?php

namespace App\Models\Claim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handler extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
}
