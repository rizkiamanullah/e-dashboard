<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemLog extends Model
{
    use HasFactory;
    protected $table = "item_logs";
    protected $fillable = [
        'name',
        'price',
        'category',
        'color',
    ];
}
