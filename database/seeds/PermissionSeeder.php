<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
class PermissionSeeder extends Seeder
{
    public function run()
    {
        $lists=['مشاهده نظرات','ویرایش نظرات','حذف نظرات','نمایش مقالات','ویرایش مقالات','حذف مقالات'];
        foreach ($lists as $key=>$value)
        {
            $permission = Permission::create (
            [
                'type'=>'clerk','name' =>$value ,
                'label' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. '
            ] );
            $permission->save ();
        }
    }
}
