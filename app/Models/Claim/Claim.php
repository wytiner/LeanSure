<?php

namespace App\Models\Claim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'insured_id',
        'axa_claim_id',
        'loss_date',
        'incept_date',
        'subject',
        'excess',
        'summary',
        'handler_id',
        'loss_adjuster_id',
        'invoice_status',
        'claim_status',
    ];

    public function insured()
    {
        return $this->belongsTo(Insured::class);
    }

    public function handler()
    {
        return $this->belongsTo(Handler::class);
    }

    public function lossAdjuster()
    {
        return $this->belongsTo(LossAdjuster::class);
    }

    public function isPaid()
    {
        return $this->invoice_status === 'Paid';
    }


}
