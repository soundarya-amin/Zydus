<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PatientEnrollment;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /**
     * Show the Admin Dashboard with stats and charts.
     */
    public function index()
    {
        // Enforce authentication
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access the Admin Dashboard.');
        }

        // Calculate dynamic stats from PatientEnrollment
        $totalPatients = PatientEnrollment::count();
        $pendingPatients = PatientEnrollment::where('status', 0)->count();
        $approvedPatients = PatientEnrollment::where('status', 1)->count();
        
        // Fetch recent patient enrollments
        $recentPatients = PatientEnrollment::latest()->take(6)->get();

        // Gender breakdown for donut chart
        $maleCount = PatientEnrollment::where('gender', 'male')->count();
        $femaleCount = PatientEnrollment::where('gender', 'female')->count();
        $otherCount = PatientEnrollment::where('gender', 'other')->count();

        // If no records exist yet, provide realistic mock baseline numbers for aesthetic preview
        $displayTotal = $totalPatients > 0 ? $totalPatients : 15000;
        $displayPending = $pendingPatients > 0 ? $pendingPatients : 4563;
        $displayApproved = $approvedPatients > 0 ? $approvedPatients : 9557;

        return view('admin.dashboard', compact(
            'totalPatients',
            'pendingPatients',
            'approvedPatients',
            'recentPatients',
            'maleCount',
            'femaleCount',
            'otherCount',
            'displayTotal',
            'displayPending',
            'displayApproved'
        ));
    }

    /**
     * Handle Admin Login with automatic Bcrypt upgrade for legacy/plain-text passwords.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->boolean('remember');

        // 1. Find user by email
        $user = User::where('email', $email)->first();

        if ($user) {
            $rawDbPassword = $user->getRawOriginal('password') ?? $user->password;
            $isValid = false;

            // Check standard Bcrypt / Argon hash
            try {
                if (Hash::check($password, $rawDbPassword)) {
                    $isValid = true;
                }
            } catch (\Throwable $e) {
                // Not a Bcrypt format (e.g. plain text or md5 in DB)
                if ($rawDbPassword === $password || $rawDbPassword === md5($password)) {
                    $isValid = true;
                }
            }

            // Fallback plain text / md5 comparison
            if (!$isValid && ($rawDbPassword === $password || $rawDbPassword === md5($password))) {
                $isValid = true;
            }

            if ($isValid) {
                // If the stored password wasn't a valid Bcrypt hash, upgrade and save it now
                if (!password_get_info($rawDbPassword)['algo']) {
                    $user->password = Hash::make($password);
                    $user->save();
                }

                // Log the user in and redirect to admin dashboard
                Auth::login($user, $remember);
                $request->session()->regenerate();

                return redirect()->intended(route('admin.dashboard'));
            }

            return back()->withInput($request->only('email', 'remember'))
                         ->withErrors(['email' => 'The provided password does not match our records.']);
        }

        // If no users exist in the database, automatically create the first administrator
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
    }

    /**
     * Handle Admin Logout with cache-busting headers.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
                         ->with('success', 'You have been logged out.')
                         ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                         ->header('Pragma', 'no-cache')
                         ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT');
    }
}
