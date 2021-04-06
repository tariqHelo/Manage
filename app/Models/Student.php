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
          'school',
          'group',
    ];
}

// class ExcelImport implements ToCollection
// {
//     /**
//     * @param Collection $collection
//     */
//     public function collection(Collection $collection)
//     {
//         DB::table('students')->truncate();
//         foreach($collection as $key => $value)
//         {
//             // dd($value[1]);
//             if($key > 0)
//             {
//                 if($value[1] == null):
//                     continue;
//                 endif;
//                 DB::table('students')->insert([
//                     //'id'	    =>$value[0]
//                      'numberId'   =>$value[1]
//                      ,'name'      =>$value[2]
//                     ,'email'      =>$value[3]
//                      ,'mobile'    =>$value[4]
//                      ,'class'     =>$value[5]
//                      ,'school'    =>$value[6]
//                 ]);
//             }
//         }
//     }
// }
