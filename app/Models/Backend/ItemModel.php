<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Backend\Category;

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
    public function category(){
        return $this->belongsTo(Category::class,'icategory');
    }
}
