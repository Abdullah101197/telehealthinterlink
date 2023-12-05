<?php

namespace App\Http\Controllers\HealthCare;

use App\Http\Controllers\Controller;
use App\Models\HealthcareMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Verify;

class healthCareController extends Controller
{

    public function index()
    {
        $healthCares = HealthcareMember::get();
        foreach ($healthCares as $health) {
            $health->user = User::find($health->email);
        }
        return view('superAdmin.healthCareProvider.healthCare', compact('healthCares'));
    }
    function healthCareLogin()
    {

        return view('healthcare.home');
    }





    function healthCareMemberLogin(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6',
        ]);


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            $user = auth()->user();
            $healthMember = HealthcareMember::where('email', $user->email)->first();

            if ($healthMember != null && $user->status == 1) {
                $name = $healthMember->name;
                return redirect()->route('HealthCare_Login', ['name' => $name]);
            } else {
                Auth::logout();
                return redirect()->route('/')->withErrors('You are disabled by admin. Please contact admin.');
            }
        } else {
            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
                // The email or password is correct, but the user status may be inactive
                return redirect()->route('/')->withErrors('Your account is inactive. Please contact admin.');
            } else {

                return redirect()->route('/')->withErrors('Invalid email or password.');
            }
        }
    }

    public  function VerifyUsers()
    {

        $users = User::where('status', 0)->get();
        return view('healthcare.verify_user', compact('users'));
    }


    public function processApproval(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        if ($request->has('approve')) {
            // Approve the user
            $user->status = 1;
            $user->save();

            return redirect('/home')->with('success', 'User approved successfully.');
        } elseif ($request->has('block')) {
            // Block the user
            $user->status = 0;
            $user->save();

            return redirect('/home')->with('success', 'User blocked successfully.');
        }
    }
}
