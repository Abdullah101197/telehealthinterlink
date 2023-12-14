<?php

namespace App\Http\Controllers\HealthCare;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SuperAdmin\CustomController;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\HealthcareMember;
use App\Models\Review;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Verify;

class healthCareController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $healthCareProviders = HealthcareMember::get();
        foreach ($healthCareProviders as $healthcp) {
            $healthcp->user = User::find($healthcp->user_id);
        }


        return view('superAdmin.healthCareProvider.healthCare', compact('healthCareProviders'));
    }
    function healthCare_home()
    {
        $this->middleware('auth');
        $healthCareMember_id = HealthcareMember::where('user_id', auth()->user()->id)->first('id')->toArray();
        $doctors = Doctor::where('healthCareMember_id', $healthCareMember_id['id'])->get();
        $totalDoctor = $doctors->count();
        $totalAppointments = [];
        $totalUsers = [];

        foreach ($doctors as $key => $doctor) {
            $appointmentsCount = Appointment::where('doctor_id', $doctor->id)->count();

            if ($appointmentsCount > 0) {
                $totalAppointments[$doctor->id] = $appointmentsCount;
            }

            // $usersCount = User::where('doctor_id', $doctor->id)->doesntHave('roles')->count();

            // if ($usersCount > 0) {
            //     $totalUsers[$doctor->id] = $usersCount;
            // }
        }
        $totalAppointment = array_sum($totalAppointments);
        $totalUser = array_sum($totalAppointments);
        $currency = Setting::first()->currency_symbol;
        $id  = auth()->user()->id;
        // $allUsers = User::where('doctor_id', $doctor->id)->doesntHave('roles')->orderBy('id', 'DESC')->get()->take(10);
        // $totalUser = User::where('doctor_id', $doctor->id)->doesntHave('roles')->count();
        // $totalReview = Review::where('doctor_id', $doctor->id)->count();

        return view('healthcare.home', compact('totalDoctor', 'totalAppointment', 'totalUser', 'id'));
    }

    function healthCareDoctorSignup(Request $request, $id)
    {

        $Hcp_id = HealthcareMember::where('user_id', $id)->first('id')->toArray();
        $healthcareProviderId = $Hcp_id['id'];
        return view('healthcare.signup', compact('healthcareProviderId'));
    }
    public function HealthCareProviderSignUp(Request $request)
    {

        $request->validate([
            'name' => 'bail|required',
            'email' => 'bail|required|email|unique:users',
            'dob' => 'bail|required',
            'gender' => 'bail|required',
            'phone' => 'bail|required|digits_between:6,12',
            'password' => 'bail|required|min:6'
        ]);
        try {
            $user = (new CustomController)->HealthCareProvider_Register($request->all());
            return redirect()->route('sent-to-admin');
        } catch (\Throwable $th) {
            throw $th;
        }
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
            $healthMember = HealthcareMember::where('user_id', $user->id)->first();

            if ($healthMember != null && $user->status == 1) {
                $name = $user->name;
                return redirect()->route('Health.Care.home', ['name' => $name]);
            } else {
                Auth::logout();
                return redirect()->route('/')->withErrors('You are disabled by admin. Please contact admin.');
            }
        } else {
            if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
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
