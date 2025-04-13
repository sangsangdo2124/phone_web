<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        use HasFactory;
        protected $table = "san_pham";
        protected $primaryKey = "id";
        public $timestamps = false;

        //Mối quan hệ với bảng PhanLoai
        public function phanLoai()
        {
                return $this->belongsTo(PhanLoai::class, 'id_phan_loai');
        }

    }


