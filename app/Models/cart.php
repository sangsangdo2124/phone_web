<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table = 'cart_items';

    protected $fillable = ['user_id', 'san_pham_id', 'so_luong',];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sanPham() {
        return $this->belongsTo(Product::class, 'san_pham_id');
    }
}
