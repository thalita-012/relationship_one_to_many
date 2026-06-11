<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $fillable=[
        'name',
        'description',
        'isActive'
    ];
    protected $casts=[
        'isActive' => 'boolean'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
