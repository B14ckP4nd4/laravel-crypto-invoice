<?php


namespace BlackPanda\LaravelCryptoInvoice\Models;


use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $table = 'lci_coins';
    protected $guarded = ['id'];

    /**
     * get the networks that support deposit for this coin
     */
    public function networks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CoinsNetwork::class,'coin_id','id');
    }

    /**
     * get to enable networks for deposit
     */
    public function enableNetworks(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->networks()->where('deposit_enable',1)->get();
    }

    /**
     * get default network for deposit
     */
    public function defaultNetwork(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->networks()->where('is_default',1)->get();
    }
}
