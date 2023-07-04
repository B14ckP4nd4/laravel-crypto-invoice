<?php


namespace BlackPanda\LaravelCryptoInvoice\Models;


use Illuminate\Database\Eloquent\Model;

class CoinsNetwork extends Model
{
    protected $table = 'lci_coins_network';
    protected $guarded = ['id'];

    /**
     * return the coins that support this network
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }

    /**
     * determine the relation with Payment Methods
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paymentMethods(){
        return $this->hasMany(PaymentMethod::class, 'network_id', ' id');
    }

    /**
     * set network name as capital
     * @param $value
     */
    public function setNetworkAttribute($value){
        $this->attributes['network'] = strtoupper($value);
    }

    /**
     * get network name
     * @param $value
     * @return mixed
     */
    public function getNetworkAttribute($value)
    {
        if(empty($value))
            return $value;

        return strtoupper($value);
    }

    /**
     * get related deposits with this network
     */
    public function deposits()
    {
        return $this->hasMany(Deposit::class,'network_id','id');
    }
}
