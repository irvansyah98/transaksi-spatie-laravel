<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'code', 
        'user_id', 
        'type',
        'merk_id',
        'location_name',
        'location_address',
        'location_latitude',
        'location_longitude',
        'transfer_bank_name',
        'transfer_account_number',
        'transfer_account_name',
        'payment_amount',
        'description',
        'price_total',
        'price_dp',
        'price_paid_off',
        'price_transport',
        'other_cost',
        'status_id',
        'service_type',
        'admin_description',
    ];

    public function getOtherCostAttribute()
    {
        if (empty($this->attributes['other_cost'])) {
            return NULL;
        }

        return json_decode($this->attributes['other_cost']);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();
    }
    
    public function merk()
    {
        return $this->belongsTo('App\Merk', 'merk_id');
    }
}
