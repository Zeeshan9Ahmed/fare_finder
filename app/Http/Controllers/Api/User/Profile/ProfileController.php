<?php

namespace App\Http\Controllers\Api\User\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\Auth\ChangePasswordRequest;
use App\Http\Requests\Api\User\Profile\UpdateProfileRequest;
use App\Http\Resources\LoggedInUser;
use App\Models\Photo;
use App\Models\User;
use App\Services\User\AccountVerificationOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class ProfileController extends Controller
{

    public function profile()
    {
        $user = User::with('license_images')->whereId(auth()->id())->first();
        return apiSuccessMessage("Profile Data", new LoggedInUser($user));
    }
    public function completeProfile(UpdateProfileRequest $request)
    {
        $email = $request->email;
        $phone = $request->phone;
        
        $check_email_exists = User::where('email', $email)->where('id', '!=', auth()->id())->first();
        $check_phone_exists = User::where('phone', $phone)->where('id', '!=', auth()->id())->first();

        if ( $check_email_exists ) {
            return commonErrorMessage("Email is already taken", 400);
        }
        if ( $check_phone_exists ) {
            return commonErrorMessage("Phone number is already taken", 400);
        }
       
        $user = Auth::user();
        


        if($request->hasFile('avatar')){
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/uploadedimages'), $imageName);
            $avatar = "/".$imageName;
            $user->avatar = $avatar;
        }
        if ($request->has('first_name'))
            $user->first_name = $request->first_name;
            
        if ($request->has('last_name'))
            $user->last_name = $request->last_name;
        
        if ($request->has('dob'))
            $user->dob = $request->dob;
        
        if ($request->has('location'))
             $user->location = $request->location;

        
        
        
        if ( $user->profile_completed == 0 ) {
            $user->email = $request->email;
            $user->phone = $request->phone;
        }

        
        $user->profile_completed = 1;
        // $user->is_active = 1;
        // if ( !$user->email_verified_at ) {

        //     $sendOtp = app(AccountVerificationOTP::class)->execute(['user' => $user]);
        // }

        
        if ( $user->save() )
        {
            // return commonSuccessMessage("Profile Updated Successfully");
            return apiSuccessMessage("Profile Updated Successfully",new LoggedInUser($user));
        }

        return commonErrorMessage("Something went wrong" , 400);
        
    }

    public function toggleNotification () {
        
        if (auth()->user()->push_notification  == 1) {
            auth()->user()->push_notification = 0;
            $message = "Off";
        } else {
            auth()->user()->push_notification = 1;
            $message = "On";
        }

        auth()->user()->save();
        return commonSuccessMessage($message);
    }
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if (!Hash::check($request->old_password , $user->password))
        {
            return commonErrorMessage("InCorrect Old password , please try again",400);
        }

        if (Hash::check($request->new_password , $user->password))
        {
            return commonErrorMessage("New Password can not be match to Old Password",400);
        } 
        
        $user->password = bcrypt($request->new_password);
        $user->save();
        if( $user )
        {
            return commonSuccessMessage("Password Updated Successfully");
        }
            return commonErrorMessage("Something went wrong while updating old password", 400);
         
    
    }

    public function content (Request $request) {
        // dd(url("content", $request->slug ));
        return apiSuccessMessage("Content" , ['url' => url("content", $request->slug )]);
    }
}
