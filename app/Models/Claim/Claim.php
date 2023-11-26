<?php

namespace App\Models\Claim;

use App\Models\ScopeOfWork;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'insured_id',
        'axa_claim_id',
        'loss_date',
        'incept_date',
        'scope_id',
        'excess',
        'summary',
        'handler_id',
        'loss_adjuster_id',
        'invoice_status',
        'claim_status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
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

    public function scopeOfWork(): BelongsTo
    {
        return $this->belongsTo(ScopeOfWork::class, 'scope_id');
    }
}
