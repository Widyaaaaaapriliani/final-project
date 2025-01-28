<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Menampilkan data user yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function viewProfile()
    {
        $user = Auth::user();  // Mendapatkan data user yang sedang login
        return view('my-profile', compact('user'));
    }

    /**
     * Menampilkan halaman edit data user yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function editProfile()
    {
        $user = Auth::user();  // Mendapatkan data user yang sedang login
        return view('user.edit', compact('user'));
    }

    /**
     * Memperbarui data user yang sedang login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'address'  => 'nullable|string|max:255',
            'phone'    => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update data user
        $user->name    = $request->input('name');
        $user->email   = $request->input('email');
        $user->address = $request->input('address');
        $user->phone   = $request->input('phone');

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();  // Simpan perubahan

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
