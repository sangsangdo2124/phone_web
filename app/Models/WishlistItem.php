<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    use HasFactory;
    protected $table = 'wishlist_items';
    public $timestamps = false;
    protected $fillable = ['user_id', 'san_pham_id'];

    // Quan hệ (tuỳ chọn)
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function sanpham()
    {
        return $this->belongsTo(Product::class, 'san_pham_id');
    }
}
