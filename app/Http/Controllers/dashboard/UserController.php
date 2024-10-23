<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\NotificationRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\ContactData;
use App\Models\User;
use App\Notifications\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function notification()
    {
        $users = User::all();
        return view('dashboard.pages.users.notification')->with('users', $users);
    }
    public function sendNotification(NotificationRequest $request)
    {
        $data = $request->validated();
        $user = User::find($data['user_id']);
        $notification = new Message(
            $data['title'],
            $data['message'],
            $data['action_url'],
            $data['type']
        );
        $user->notify($notification);
        return redirect()->back()->with('success', 'Notification sent successfully');
    }
}
