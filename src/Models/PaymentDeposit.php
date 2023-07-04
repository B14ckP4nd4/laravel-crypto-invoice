<?php


namespace BlackPanda\LaravelCryptoInvoice\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class PaymentDeposit extends Model
{
    protected $table = 'lci_payment_deposits';
    protected $guarded = ['id'];

    public function deposit()
    {
        return $this->belongsTo(Deposit::class,'deposit_id','id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class,'payment_id','id');
    }
}
