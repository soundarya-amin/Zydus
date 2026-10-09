<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PatientEnrollment;
use App\Models\User;

class AdminDashboardController extends Controller
{
    // Admin Dashboard
    public function index()
    {
        try{
            if (!Auth::check()) {
                return redirect()->route('admin.login')->with('error', 'Please log in to access the Admin Dashboard.');
            }

            // Calculate dynamic stats from PatientEnrollment
            $totalPatients = PatientEnrollment::count();
            $pendingPatients = PatientEnrollment::where('status', 0)->count();
            $approvedPatients = PatientEnrollment::where('status', 2)->count();
            
            // Fetch recent patient enrollments
            $recentPatients = PatientEnrollment::where('status',0)->latest()->take(6)->get();

            return view('admin.dashboard', compact(
                'totalPatients',
                'pendingPatients',
                'approvedPatients',
                'recentPatients'
            ));
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    //Admin Login
    public function login(Request $request)
    {
        try{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $email = $request->input('email');
            $password = $request->input('password');
            $remember = $request->boolean('remember');

            $user = User::where('email', $email)->first();

            if ($user) {
                $rawDbPassword = $user->getRawOriginal('password') ?? $user->password;
                $isValid = false;

                try {
                    if (Hash::check($password, $rawDbPassword)) {
                        $isValid = true;
                    }
                } catch (\Throwable $e) {
                    if ($rawDbPassword === $password || $rawDbPassword === md5($password)) {
                        $isValid = true;
                    }
                }

                if (!$isValid && ($rawDbPassword === $password || $rawDbPassword === md5($password))) {
                    $isValid = true;
                }

                if ($isValid) {
                    if (!password_get_info($rawDbPassword)['algo']) {
                        $user->password = Hash::make($password);
                        $user->save();
                    }

                    Auth::login($user, $remember);
                    $request->session()->regenerate();

                    return redirect()->intended(route('admin.dashboard'));
                }

                return back()->withInput($request->only('email', 'remember'))
                            ->withErrors(['email' => 'The provided password does not match.']);
            }

            if (User::count() === 0) {
                $user = User::create([
                    'name' => 'Administrator',
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);

                Auth::login($user, $remember);
                $request->session()->regenerate();

                return redirect()->route('admin.dashboard');
            }

            return back()->withInput($request->only('email', 'remember'))
                        ->withErrors(['email' => 'No account found with this email address.']);
        } catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    // Admin Logout
    public function logout(Request $request)
    {
        try{
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login')
                            ->with('success', 'You have been logged out.')
                            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                            ->header('Pragma', 'no-cache')
                            ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }    
}
