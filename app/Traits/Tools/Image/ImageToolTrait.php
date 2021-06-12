<?php
namespace App\Traits\Tools\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

trait ImageToolTrait
{
    /**
     * @param $images
     * @return bool
     */
    public function deleteImages($images)
    {
        foreach($images as $image) {
            $this->DeleteImage($image);
        }
        return true;
    }



    /**
     * @param $files
     * @return array
     */
    public function saveImages($files){
        $id=0;
        $images=array();
        foreach($files as $file)
        {
            $images[$id]=$this->saveImage($file);
            $id++;
        }
        return $images;
    }


    /**
     * @param $beforeImageName
     * @param $newImageFile
     * @param null $newImageName
     * @return string|null
     */
    public function saveNewImageAndDeleteBeforeImage($beforeImageName, $newImageFile, $newImageName=null)
    {
        #delete image before
        $this->deleteImage($beforeImageName);
        #save new image
        return $this->saveImage($newImageFile,$newImageName);
    }

    /**
     * @param $file
     * @param null $name
     * @return string|null
     */
    public function saveImage($file,$name=null){
        $imagePath = "/images/";
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
        $file->move(public_path($imagePath) , $name);
        return $name;
    }


    /**
     * @param $filename
     * @return bool
     */
    public function deleteImage($filename){
        $file = public_path() . '/images/' .$filename;
        return File::delete($file) ? true : false;
    }

    /**
     * @param $filename
     * @param $width
     * @param $height
     * @return string
     */
    private function fixed_name_by_size($filename, $width, $height)
    {
        $name="";
        if($width and $height){
            $name="size_".$width."_".$height."_".$filename;
        }
        elseif ($width){
            $name="size_".$width."_".$filename;
        }
        elseif ($height){
            $name="size_".$height."_".$filename;
        }
        return $name;
    }

}
