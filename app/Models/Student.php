<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
         'name' ,
          'email' ,
          'mobile',
          'numberId',
          'class',
          'school'

    ];
        // public function collection(Collection $collection)
        // {
        //     Student::truncate();
        //     foreach($collection as $key => $value)
        //     {
        //     if($key > 0)
        //     {
        //         Student::insert([

        //         //'No' =>$value[0]
        //         'name'       =>$value[1]
        //         ,'mobile'    =>$value[2]
        //         ,'email'     =>$value[3]
        //         ,'numberId'  =>$value[4] 
        //         ,'class'     =>$value[5]
        //         ,'school'    =>$value[6]
                
        //         ]);
        //     }
        //   }
        // }

}
