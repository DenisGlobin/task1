<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'phone', 'page_id'];
    protected $dates = ['created_at', 'updated_at'];
}
