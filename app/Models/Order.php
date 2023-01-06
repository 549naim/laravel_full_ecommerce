<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'user_id',
        'address',
        'email',
        'phone',
        'amount',
        'transaction_id',
        'currency',
        'phone_number',
        'city',
        'state',
        'country',
        'postalcode',
        'status',
        'msg',
        'traking_num',
        
    ];
    public function orderitems(){
        return $this->hasMany(Order_items::class);
    }
}
