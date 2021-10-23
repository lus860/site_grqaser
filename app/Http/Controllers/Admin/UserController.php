<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function profile()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $request->validate( [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'file' => ['nullable', 'image', 'mimes:jpeg,png,jpg'],
        ]);

        $user = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),

        ];

        $phone = $request->input('phone');
        if(strlen($phone) == 9 && substr($phone,0,1) == 0 ){
            $user['phone'] = '+374'.substr($phone, 1);
        }elseif(strlen($phone) == 12 && substr($phone,0,4) == '+374'){
            $user['phone'] = $phone;
        }elseif(strlen($phone) == 8 ){
            $user['phone'] = '+374'.$phone;
        }

        if($request->file) {
            //ImageController::imageDelete(Auth::user()->image, true);
            $image = ImageController::imageUpload($request->file, true);
            $user['image'] = $image;
        }
        if($user){

            $id = Auth::user()->id;
            $userAuth = User::find($id);
            if(User::where('id',  $id)->update( $user )){

                $meesages = 'Profile updated !!';
                return redirect('/admin/dashboard')->with('success', $meesages);
            }
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
    }
}
