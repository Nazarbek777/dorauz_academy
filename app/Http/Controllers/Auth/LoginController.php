<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\MainHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function all()
    {
        $users = User::latest()->paginate(10);
        return view('auth.user.all', compact('users'));
    }
    public function admin()
    {
        $users = User::where('role', 0)->paginate(10);
        return view('auth.user.admin', compact('users'));
    }

    public function student()
    {
        // Filiallarni oldindan yuklab olish
        $users = User::with('branch')
                    ->where('role', 1)
                    ->get();

        return view('auth.user.students', compact('users'));
    }


    public function teacher()
    {
       $users = User::where('role', 2)->paginate(10);
        return view('auth.user.teacher', compact('users'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register_store(Request $request)
    {
        $request->validate([
            'branch_id' => 'nullable|exists:branches,id',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email:rfc,dns|unique:users,email',
            'password' => 'nullable|min:6',
            'phone_number' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'role' => 'nullable|in:0,1,2',
        ]);

        $user = User::create([
            'branch_id' => $request->input('branch_id') ?? null,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'specialization' => $request->input('specialization'),
            'role' => $request->input('role'),
        ]);

        $user->save();

        return redirect('/admin/user/all')->with('success', 'Muvaffaqiyatli ro\'yxatdan o\'tdingiz');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->branch_id = $request->input('branch_id');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->specialization = $request->input('specialization');
        $user->role = $request->input('role');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('user.all')->with('success', 'Foydalanuvchi muvaffaqiyatli yangilandi');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Foydalanuvchi muvaffaqiyatli o\'chirildi');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
