<?php
namespace App\Traits\Tools\File;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

trait FileToolTrait
{
    public function SaveFiles($files){
        $id=0;
        $list=array();
        foreach($files as $file)
        {
            $list[$id]=$this->SaveFile($file);
            $id++;
        }
        return $list;
    }
    public function DeleteFiles($files){
        foreach($files as $file)
        {
            $this->DeleteFile($file);
        }
        return true;
    }
    public function SaveFile($file,$name=null){
        $filePath = "/files/";
        $end = $file->getClientOriginalExtension();
        //$filename = $file->getClientOriginalName();//get really filename
        $end='.'.$end;
        if(! $name)
        {
            $strRandom=Str::random(3);
            $timeRandom=Carbon::now()->timestamp;
            $name =$strRandom.$timeRandom.$end;
        }
        else
        {
            $name=$name.$end;
        }
        $file->move(public_path($filePath) , $name);
        return $name;
    }
    public function DeleteFile($filename){
        $file = public_path() . '/files/' .$filename;
        File::delete($file);
        return $file;
    }
    public function RenameFile($filename,$newname=null){
        if(!$newname)
        {
            $newname=$filename;
        }
        $file = public_path() . '/files/'.$filename;
        $newFile=public_path() . '/files/'.$newname;
        Storage::move($file,$newFile);
    }
    public function RenameDeleteFile($file){
        $newNAme='delete_'.$file;
        return $this->RenameFile($file,$newNAme);
    }
}
