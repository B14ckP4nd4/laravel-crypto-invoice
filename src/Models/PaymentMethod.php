<?php

namespace BlackPanda\LaravelCryptoInvoice\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'lci_payment_methods';
    protected $guarded = ['id'];

    public function wallet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wallet::class,'wallet_id','id');
    }

    public function network()
    {
        return $this->belongsTo(CoinsNetwork::class,'network_id','id');
    }

    public function coin()
    {
        return $this->belongsTo(Coin::class,'coin_id','id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

}
