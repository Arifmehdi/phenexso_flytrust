<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id', 'name', 'mobile', 'email', 'address_title',
        'subtotal', 'grand_total', 'payment_method', 'payment_status',
        'payment_gateway', 'delivery_cost', 'addedby_id', 'editedby_id', 'order_note','payment_trx_id'
        // ,'district_id','upazila_id',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'order_id');
       
    }

    public function due()
    {
        return $this->grand_total - $this->payments()->sum('paid_amount');
       
    }

    public function paid()
    {
        return  $this->payments()->sum('paid_amount');
    }

}