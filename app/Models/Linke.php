<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linke extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'route',
        'parent_id',
        'show_in_menu',
        'order_id',
        'icon'
    ];
    public function subMenus()
    {
        return $this->hasMany("\App\Models\Linke", "parent_id", "id");
    }
    public function parentMenu()
    {
        return $this->belongsTo("\App\Models\Linke", "parent_id", "id");
    }
    public function users()
    {
        //return $this->belongsToMany('App\User','users_links','link_id','user_id');
        return $this->belongsToMany('App\User', 'users_links');
    }
}
