<?php


namespace BlackPanda\LaravelCryptoInvoice\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'lci_deposits';
    protected $guarded = ['id'];

    /**
     * return the users that own this wallet
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function network()
    {
        return $this->belongsTo(CoinsNetwork::class,'network_id','id');
    }

    public function coin()
    {
        return $this->belongsTo(Coin::class,'coin_id','id');
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class,'wallet_id','id');
    }
}
