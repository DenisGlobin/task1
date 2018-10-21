<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = "visitors";
    protected $primaryKey = "id";
    //protected $fillable = ['name', 'yesterday_cr', 'today_cr', 'week_cr'];
    protected $dates = ['created_at', 'updated_at'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
