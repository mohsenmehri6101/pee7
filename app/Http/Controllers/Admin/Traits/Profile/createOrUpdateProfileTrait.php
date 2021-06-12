<?php
namespace App\Http\Controllers\Admin\Traits\Profile;

use App\User;
use Illuminate\Http\Request;

trait createOrUpdateProfileTrait
{
    public function create()
    {
        return view('admin.profile.create', ['user'=>auth()->user()]);
    }

    # save Admin
    private function createAdmin(User $user, $inputs)
    {
        return $user->admin()->create([
            'about' => $inputs['about'],
        ]);
    }

    # update Admin
    private function updateAdmin(User $user, $inputs)
    {
        return $user->admin()->update([
            'about' => $inputs['about'],
        ]);
    }

    # store Method
    public function store(Request $request)
    {
        $user = auth()->user();
        $inputs=makeInputs($request);

        #save Location
        $this->createLocationUser($user,$inputs);

        #save contact
        $this->createContactUser($user,$inputs);

        #save image
        $this->saveImageUser($user,$request);

        #save admin
        $this->createAdmin($user,$inputs);

        # active user or completeInfo
        $user->update(['completeInfo'=>true]);

        alert()->success("تکمیل اطلاعات با موفقیت انجام شد", 'تشکر از شما!')->autoclose('3000');
        return redirect()->route('admin.profile.index');
    }

    public function edit()
    {
        $user = auth()->user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $inputs=makeInputs($request);

        #update Location
        $this->updateLocationUser($user,$inputs);
        #update contact
        $this->updateContactUser($user,$inputs);

        #update image
        $this->updateImageUser($user,$request);

        #save admin
        $this->updateAdmin($user,$inputs);

        alert()->warning("ویرایش اطلاعات با موفقیت انجام شد", 'تشکر از شما!')->autoclose('3000');
        return redirect()->route('admin.profile.index');
    }

}
