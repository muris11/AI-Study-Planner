<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudyReminder;
use App\Models\User;

class TestController extends Controller
{
    public function sendReminder(Request $request)
    {
        if (!app()->environment('local') && (!session('user_role') || session('user_role') !== 'admin')) {
            abort(403, 'Access denied');
        }

        $user = session('user_name') ? User::where('name', session('user_name'))->first() : null;
        if (!$user) {
            return redirect()->route('login.form')->withErrors(['error' => 'Please login first']);
        }

        try {
            Mail::to($user->email)->send(new StudyReminder(
                'Test Blok Belajar - Matematika',
                now('Asia/Jakarta')->format('H:i'),
                now('Asia/Jakarta')->addMinutes(45)->format('H:i')
            ));

            return back()->with('ok', 'Test email sent to: ' . $user->email);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to send email: ' . $e->getMessage()]);
        }
    }
}

