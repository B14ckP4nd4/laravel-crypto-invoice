<?php

namespace BlackPanda\LaravelCryptoInvoice\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PaymentCoupon extends Model
{
    protected $table = 'lci_payment_coupon';

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function payment(){
        return  $this->belongsTo(Payment::class,'payment_id','id');
    }

}
