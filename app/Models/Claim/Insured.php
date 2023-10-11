<?php

namespace App\Models\Claim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insured extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact'];

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
