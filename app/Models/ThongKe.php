<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
    protected $table = 'tbl_thongke';
    public $timestamps = false;
    protected $fillable = ['ngaydat', 'donhang', 'doanhthu'];

}
