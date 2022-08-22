<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('user.profile', [
            'user' => $user,
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        if ($request->file('user_photo')) {

            $name = pathinfo($user->profile_pic, PATHINFO_FILENAME);
            $ext = pathinfo($user->profile_pic, PATHINFO_EXTENSION);
    
            $path = asset('/images') . '/' . $name . '.' . $ext;
    
            if (file_exists($path)) {
                unlink($path);
            }

            $photo = $request->file('user_photo');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            $photo->move(public_path().'/images', $file);
            $user->profile_pic = asset('/images') . '/' . $file;
        }
        
        
        
        $user->name = $request->user_name;

        $user->save();

        return redirect()->route('user-profile')->with('notification', 'Profile updated.');
    }

    // public function deletePicture(Animal $animal) 
    // {
    //     $name = pathinfo($animal->photo, PATHINFO_FILENAME);
    //     $ext = pathinfo($animal->photo, PATHINFO_EXTENSION);

    //     $path = asset('/images') . '/' . $name . '.' . $ext;
    //     if(file_exists($path)) {
    //         unlink($path);
    //     }
        
    //     $animal->photo = null;
    //     $animal->save();
    
    //     return redirect()->back()->with('deleted', 'Animal have no photo now');
    // }
}
