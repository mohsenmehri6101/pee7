<?php
namespace App\Http\Controllers\Fathers\layouts\Profile;
use App\User;
use Illuminate\Http\Request;

trait functionsSaveUserTrait
{
    # save methods
    protected function createLocationUser(User $user,$inputs)
    {
        # save location
        return $user->location()->create([
            'province' => $inputs['province'],
            'city' => $inputs['city'],
            'plate' => $inputs['plate'],
            'address' => $inputs['address'],
        ]);
    }
    protected function createContactUser(User $user,$inputs)
    {
        # save contact
        return $user->contact()->create(
            [
            'mobiles' => $inputs['mobiles'],
            'phones' => $inputs['phones'],
        ]);
    }
    # save methods

    # update methods
    protected function updateLocationUser(User $user,$inputs)
    {
        # update location
        return $user->location()->update([
            'province' => $inputs['province'],
            'city' => $inputs['city'],
            'plate' => $inputs['plate'],
            'address' => $inputs['address'],
        ]);
    }
    protected function updateContactUser(User $user,$inputs)
    {
        # update contact
        return $user->contact()->update(
            [
            'mobiles' => $inputs['mobiles'],
            'phones' => $inputs['phones'],
        ]);
    }
    # update methods
    protected function saveImageUser(User $user,Request $request)
    {
        if ($file=$request->file('image')){
            $filename = $this->SaveImage($file);
            #$filename = $this->ReSizeImageByReplace($filename, "200");
            $user->update(
                [
                    'image' => $filename,
                ]);
            return true;
        }
        return false;
    }
    protected function updateImageUser(User $user,Request $request)
    {
        if ($file=$request->file('image')){
            $filename=$this->saveNewImageAndDeleteBeforeImage($user->image,$file);
            #$filename = $this->ReSizeImageByReplace($filename, "200");
            $user->update(
                [
                    'image' => $filename,
                ]);
            return true;
        }
        return false;
    }
    public static function createUser($inputs,$level){
        return User::create([
            'name'=>$inputs['name'],
            'phone'=>$inputs['phone'],
            'level'=>$level,
            'email'=>$inputs['email'] ?? null,
            'password'=>$inputs['password'] ?? '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);
    }

}
