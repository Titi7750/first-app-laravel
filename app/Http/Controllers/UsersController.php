<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect()->route('users.index')->with('message', 'User deleted');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(8), Password::min(8)->letters(), Password::min(8)->mixedCase(), Password::min(8)->numbers(), Password::min(8)->symbols()],
            'birthday' => ['required', 'date'],
        ]);

        User::whereId($id)->update($validated);

        return redirect()->route('users.index')->with('message', 'User updated');
    }

    public function create()
    {
        return view('users.create', ['user' => new User]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Password::min(8), Password::min(8)->letters(), Password::min(8)->mixedCase(), Password::min(8)->numbers(), Password::min(8)->symbols()],
            'birthday' => ['required', 'date'],
        ]);

        User::create($validated);

        return redirect()->route('users.index')->with('message', 'User created');
    }

    public function login()
    {
        return view('connexion.login');
    }

    public function connexion(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user) {
            if (password_verify($validated['password'], $user->password)) {
                session(['user' => $user]);
                return redirect()->route('users.index');
            }
        }

        return redirect()->route('connexion.login')->with('message', 'Wrong credentials');
    }
}
