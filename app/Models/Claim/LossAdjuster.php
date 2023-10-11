<?php

namespace App\Models\Claim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LossAdjuster extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'telephone', 'email'];

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }
}
