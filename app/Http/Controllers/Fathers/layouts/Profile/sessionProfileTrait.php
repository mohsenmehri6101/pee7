<?php
namespace App\Http\Controllers\Fathers\layouts\Profile;

trait sessionProfileTrait
{
    /*                  SESSIONS                     */
    public function sessions(){
        # TODO ConfirmPassword
        alert ()->warning( "این قابلیت فعلا غیرفعال میباشد", 'توجه' )->autoclose ( '3500' );
        return back();
    }
    /*                  SESSIONS                     */

}
