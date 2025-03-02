<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table      = 'carts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
