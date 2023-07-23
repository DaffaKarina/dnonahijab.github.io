<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index($id)
    {
        $profile = User::find($id);
        $title = 'Profile';
        return view('admin.profile', compact(['title', 'profile']));
    }

    public function store(Request $request, $type)
    {
        if ($type == 'profile') {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|max:255|email:rfc,dns|unique:users,email,' . $request->id,
                'picture' => 'image|mimes:jpeg,jpg,png|max:5120|nullable',
                'telepon' => 'required|numeric',
            ]);

            $profile = User::find($request->id);
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->telp = $request->telepon;
            DB::beginTransaction();
            try {
                $profile->save();

                if ($request->hasFile('picture')) {
                    if (!empty($profile->image->id) && Storage::exists('public/profile/' . $profile->image->name)) {
                        Storage::delete('public/profile/' . $profile->image->name);
                    }
                    $imageName =  time() . rand() . '.' . $request->file('picture')->getClientOriginalExtension();
                    $request->file('picture')->storeAs('profile', $imageName, 'public');
                    $imagePath = 'storage/profile/' . $imageName;
                    $imageSize = Storage::disk('public')->size('profile/' . $imageName);

                    $image = empty($profile->image->id) ? new Image : Image::find($profile->image->id);
                    $image->name = $imageName;
                    $image->path = $imagePath;
                    $image->size = $imageSize;
                    $profile->image()->save($image);
                }
                DB::commit();
                return redirect()->route('profile', $profile->id)->with('status', 'Profile Updated!');
            } catch (\Exception $e) {
                DB::rollBack();
                // dd($e->getMessage());
                return redirect()->route('profile', $profile->id)->with('error', 'Something went wrong!');
            }
        } else if ($type == 'password') {
            $request->validate([
                'password' => 'required|min:6|confirmed', Rules\Password::defaults(),
            ]);

            DB::beginTransaction();
            try {
                $profile = User::find($request->id);
                $profile->password = Hash::make($request->password);
                $profile->save();
                // auth()->user()->update(Hash::make($request->only('password')));
                DB::commit();
                return redirect()->route('profile', $request->id)->with('status', 'Password Updated!');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('profile', $request->id)->with('error', 'Something went wrong!');
            }
        }
    }

    public function destroy($type, $id)
    {
        DB::beginTransaction();
        try {
            DB::commit();
            $profile = User::find($id);
            if ($type == 'picture' && !empty($profile->image->name && Storage::exists('public/profile/' . $profile->image->name)))
                Storage::delete('public/profile/' . $profile->image->name);
            return redirect()->route('profile', $profile->id)->with('status', 'Image deleted!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('profile', $profile->id)->with('error', 'Something went wrong!');
        }
    }
}