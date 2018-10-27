<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = "visitors";
    protected $primaryKey = "id";
    protected $fillable = ['user_agent', 'ip', 'http_referer', 'page_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
