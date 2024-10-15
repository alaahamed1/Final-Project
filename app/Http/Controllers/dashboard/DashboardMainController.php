<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardMainController extends Controller
{
    public function index(){
        return view("dashboard.pages.home");
    }

    public function notificatons(){
        $user = auth()->user();
        /* @var $user User */
        return $user->unreadNotifications;
    }
}
