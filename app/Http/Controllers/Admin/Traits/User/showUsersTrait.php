<?php
namespace App\Http\Controllers\Admin\Traits\User;
trait showUsersTrait
{
    //admins
    public function admins()
    {
        $this->setCache('level','admin');
        $level_show='مدیران سایت';
        $link='admin.users.admins';
        return view('admin.users.showUsersInTable',compact('level_show','link'));
    }

    //suppliers
    public function suppliers()
    {
        $this->setCache('level','supplier');
        $level_show='تولید کنندگان';
        $link='admin.users.suppliers';
        return view('admin.users.showUsersInTable',compact('level_show','link'));
    }
    public function all()
    {
        $this->setCache('level',null);
        $level_show='همه کاربران';
        $link='admin.users.all';
        return view('admin.users.showUsersInTable',compact('level_show','link'));
    }

    public function clerks()
    {
        $this->setCache('level','clerk');
        $level_show='پشتیبان های تولید کننده';
        $link='admin.users.clerks';
        return view('admin.users.showUsersInTable',compact('level_show','link'));
    }

    //person
    public function persons()
    {
        $this->setCache('level','person');
        $level_show='اشخاص حقیقی';
        $link='admin.users.persons';
        return view('admin.users.showUsersInTable',compact('level_show','link'));
    }

    //companies
    public function companies()
    {
        $this->setCache('level','company');
        $level_show='شرکت ها';
        $link='admin.users.companies';
        return view('admin.users.showUsersInTable',compact('level_show','link'));
    }

}
