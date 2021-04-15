<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class ExcelImport implements ToCollection
{

    protected $table = 'students';

    public $group;

    // protected $fillable = [
    //       'group',
    // ];
    /**
    * @param Collection $collection
    */

    public function __construct($group = null){
        $this->group = $group;
    }

    public function collection(Collection $collection)
    {   
        // DB::table('students')->truncate();
        foreach($collection as $key => $value)
        {
            // dd($value[1]);
            if($key > 0)
            {
                if($value[1] == null):
                    continue;
                endif;
                DB::table('students')->insert([
                    //'id'	    =>$value[0]
                     'numberId'   =>$value[1]
                     ,'name'      =>$value[2]
                     ,'email'      =>$value[3]
                     ,'mobile'    =>$value[4]
                     ,'class'       =>    isset($value[5]) ? $value[5] : ''
                     ,'school'      =>   isset($value[6]) ? $value[6] : '',
                     'group_id'      => $this->group,
                    
                ]);
                  

            }
        }
    }
}
