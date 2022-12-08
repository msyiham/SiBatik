<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVarian extends Model
{
    use HasFactory;
    protected $table = "produkvarian";
    protected $guarded = [];
    protected $primaryKey = "id_varian";
}
