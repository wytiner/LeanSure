<?php

namespace App\Models\Claim;

use App\Models\County;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'insured_id',
        'address_line1',
        'address_line2',
        'town',
        'county_id',
        'eircode',
    ];

    public function insured()
    {
        return $this->belongsTo(Insured::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
