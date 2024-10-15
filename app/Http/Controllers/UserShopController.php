<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\ContactData;
use Illuminate\Support\Facades\Hash;

class UserShopController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('website.pages.profile', compact('user'));
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function contactForm(ContactRequest $request)
    {
        $data = $request->validated();
        ContactData::create($data);
        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
