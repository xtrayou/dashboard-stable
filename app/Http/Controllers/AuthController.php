<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        // Jika sudah login, redirect ke admin dashboard
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }

        return view('auth.login');
    }

    /**
     * Handle login attempt
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Log successful login
            Log::info('User logged in: ' . Auth::user()->email);

            return redirect()->intended(route('admin.index'))
                ->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->except('password'));
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        $userName = Auth::user()->name ?? 'User';

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Log successful logout
        Log::info('User logged out: ' . $userName);

        return redirect()->route('login')
            ->with('success', 'Anda berhasil logout. Sampai jumpa!');
    }

    /**
     * Show user profile
     */
    public function profile()
    {
        return view('auth.profile', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah digunakan',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile berhasil diupdate!');
    }

    /**
     * Create default admin user (untuk development)
     */
    public function createAdmin()
    {
        // Hanya untuk development - hapus di production
        if (app()->environment('production')) {
            abort(404);
        }

        try {
            // Create multiple admin users for testing
            $users = [
                [
                    'email' => 'admin@diskominfo.go.id',
                    'name' => 'Administrator DISKOMINFO',
                    'password' => 'admin123'
                ],
                [
                    'email' => 'user@diskominfo.go.id',
                    'name' => 'User Test',
                    'password' => 'password123'
                ],
                [
                    'email' => 'operator@diskominfo.go.id',
                    'name' => 'Operator Dashboard',
                    'password' => 'operator123'
                ]
            ];

            $createdUsers = [];
            foreach ($users as $userData) {
                $user = User::firstOrCreate(
                    ['email' => $userData['email']],
                    [
                        'name' => $userData['name'],
                        'password' => Hash::make($userData['password']),
                        'email_verified_at' => now(),
                    ]
                );

                $createdUsers[] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $userData['password'],
                    'created' => $user->wasRecentlyCreated
                ];
            }

            return view('auth.create-admin', [
                'users' => $createdUsers,
                'success' => true
            ]);
        } catch (\Exception $e) {
            return view('auth.create-admin', [
                'users' => [],
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }
}
