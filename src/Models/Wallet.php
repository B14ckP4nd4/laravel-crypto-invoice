<?php


namespace BlackPanda\LaravelCryptoInvoice\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'lci_wallets';
    protected $guarded = ['id'];
    protected $hidden = ['private_key'];

    /**
     * return the users that own this wallet
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * set private key
     * @param $value
     */
    public function setPrivateKeyAttribute($value){
        $this->attributes['private_key'] = encrypt($value);
    }

    /**
     * get private key
     * @param $value
     * @return mixed
     */
    public function getPrivateKeyAttribute($value): mixed
    {
        if(empty($value))
            return $value;

        return decrypt($value);
    }


    /**
     * get related network with this wallet
     */
    public function network()
    {
        return $this->belongsTo(CoinsNetwork::class,'network_id','id');
    }

    /**
     * get related deposits
     **/
    public function deposits()
    {
        return $this->hasMany(Deposit::class,'wallet_id','id');
    }
}
