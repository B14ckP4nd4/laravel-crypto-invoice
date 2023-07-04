<?php

namespace BlackPanda\LaravelCryptoInvoice\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    protected $table = 'lci_user_coupon';
    protected $guarded = ['id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function coupon(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Coupon::class,'coupon_id','id');
    }

}
