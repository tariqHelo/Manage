<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    use HasFactory;
    protected $table = 'image_details';

    // protected $fillable = [
    //     'image',
    //     'title',
    //     'option1',
    //     'option2',
    // ];


    public function students(){
        return $this->hasMany("App\Models\Student");
    }
    
}
