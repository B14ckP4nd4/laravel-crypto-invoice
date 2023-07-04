<?php

namespace BlackPanda\LaravelCryptoInvoice\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'lci_coupons';
    protected $guarded = ['id'];

}
