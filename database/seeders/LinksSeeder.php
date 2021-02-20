<?php

namespace Database\Seeders;

use App\Models\Linke;

use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $link = Linke::create(['title' => 'قسم الطلاب', 'icon' => 'icon-home', 'route' => '#']);
            Linke::create(['title' => ' كل الطلاب ', 'icon' => 'icon-list', 'route' => 'test', 'parent_id' => $link->id]);
            Linke::create(['title' => 'إضافة طالب', 'icon' => 'icon-plus', 'route' => 'test', 'parent_id' => $link->id]);

        $link = Linke::create(['title' => 'المجموعات والصلاحيات ', 'icon' => 'icon-home', 'route' => '#']);
            Linke::create(['title' => 'المستخدمين', 'icon' => 'icon-list', 'route' => 'users.index', 'parent_id' => $link->id]);
            Linke::create(['title' => 'الصلاحيات والستخدمين', 'icon' => 'icon-plus', 'route' => 'roles.index', 'parent_id' => $link->id]);


        $link = Linke::create(['title' => 'الفعاليات', 'icon' => 'icon-home', 'route' => '#']);
            Linke::create(['title' => 'القوالب', 'icon' => 'icon-list', 'route' => 'users.index', 'parent_id' => $link->id]);
            Linke::create(['title' => 'عرض الفعاليات', 'icon' => 'icon-plus', 'route' => 'roles.index', 'parent_id' => $link->id]);


    }
}
