<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;
    protected $fillable =[
        'item_code',
        'iname',
        'idescription',
        'icategory',
        'istatus',
        'iimage',
    ];
}
