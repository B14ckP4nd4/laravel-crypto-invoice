<?php

namespace BlackPanda\LaravelCryptoInvoice\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'lci_payments';
    protected $guarded = ['id'];

    /*
     * Get the parent paymentable model (kycOrder , VPN Order or etc).
     */
    public function paymentable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'orderable_type','orderable_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class,'id','payment_method_id');
    }

    public function getPaymentPriceAttribute()
    {
        return floatval($this->amount - $this->discount);
    }

    public function getDiscountPercentAttribute()
    {
        if($this->discount == 0)
            return 0;

        return (int) ($this->discount * 100) / $this->amount;
    }

    public function deposits()
    {
        return $this->belongsToMany(Deposit::class,'payment_deposits','payment_id','deposit_id');
    }

}
