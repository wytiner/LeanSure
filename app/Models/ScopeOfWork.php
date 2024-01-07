<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScopeOfWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'description',
    ];


    public function getMaterials()
    {
        return $this->where('reference', 'like', 'M%')->get();
    }

    public function getScopeOfWorks()
    {
        return $this->where('reference', 'not like', 'M%')->get();
    }

}
