<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderId extends Model
{
    use HasFactory;    protected $table = 'tbl_order_ids';
    public $timestamps = false;
    protected $fillable = ['id', 'order_id'];
}
