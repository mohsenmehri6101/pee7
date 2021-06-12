<?php
namespace App\Http\Controllers\Test\Traits;
use App\User;
use Yajra\Datatables\Datatables;

trait Yajra
{
    //section one
    public function one(){
        $admin=User::whereLevel('admin')->first();
        if(! $admin){
            alert ()->error('ابتدا کاربر ادمین  بسازید و لاگین کنید', 'دقت شود' )->persistent('باشه فهمیدم');
            return back();
        }
        return view('test.yajra.one');
    }
    public function one_getusers(){
        $users=User::all();
        return Datatables::of(User::query())->make(true);
    }

    //section two
    public function two(){
        $admin=User::whereLevel('admin')->first();
        if(! $admin){
            alert ()->error('ابتدا کاربر ادمین  بسازید و لاگین کنید', 'دقت شود' )->persistent('باشه فهمیدم');
            return back();
        }
        return view('test.yajra.two');
    }

    public function two_getusers(){
        $users=User::all();
        /*return Datatables::of(User::query())
        ->setRowClass(function ($user) {
            return $user->id % 2 == 0 ? 'bg-secondary' : '';
        })
        ->make(true);*/
        return Datatables::of(User::query())
            ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-secondary" }}')
            ->setRowId('{{$name}}_tr')
            ->setRowAttr(['align' => 'center'])
            ->setRowData([
                'data-id' => 'row-{{$id}}',
                'data-name' => 'row-{{$name}}',
                'data-create' => '{{verta($created_at)->formatDifference() }}',
                'data-update' => '{{verta($updated_at)->addHours(3)->addMinutes(30)->formatDatetime()}}',
            ])
            ->make(true);
    }

    //section three
    public function three(){
        $admin=User::whereLevel('admin')->first();
        if(! $admin){
            alert ()->error('ابتدا کاربر ادمین  بسازید و لاگین کنید', 'دقت شود' )->persistent('باشه فهمیدم');
            return back();
        }
        return view('test.yajra.three');
    }
    public function three_getusers(){
        $users=User::all();
        return Datatables::of(User::query())
            ->setRowClass('{{ $id % 2 == 0 ? "text-info" : "text-secondary" }}')
            ->setRowId('{{$name}}_tr')
            ->setRowAttr(['align' => 'center'])
            ->setRowData([
                'data-id' => 'row-{{$id}}',
                'data-name' => 'row-{{$name}}',
                'data-create' => '{{verta($created_at)->formatDifference() }}',
                'data-update' => '{{verta($updated_at)->addHours(3)->addMinutes(30)->formatDatetime()}}',
            ])
            ->addColumn('intro', 'Hi {{$name}}!')
            ->toJson();
    }
}
