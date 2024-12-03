<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function checkRole()
    {
        if (Auth::user()->role_id === 1) {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::user()->role_id === 2) {
            return redirect()->route('teknisi.dashboard');
        } else {
            abort(404);
        }
    }
}
