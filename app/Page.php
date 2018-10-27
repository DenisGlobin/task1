<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = "pages";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
    protected $dates = ['created_at', 'updated_at'];

    public function visitor()
    {
        return $this->hasMany(Visitor::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
