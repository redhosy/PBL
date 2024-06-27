<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserPassword;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_user = User::latest()->paginate(10);
        return view('dashboard.pengguna.index', compact('data_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'peran' => 'required|string',
        ]);

        // Generate random password
        $randomPassword = \Illuminate\Support\Str::random(8);
        Log::info('Generated random password: ' . $randomPassword);
        // Simpan data ke dalam database
        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->role = $request->peran;
        $password = Hash::make($randomPassword);
        $user->password = $password;
        $user->save();

        // Kirim email dengan password sementara
        Mail::to($request->email)->send(new NewUserPassword($randomPassword));

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'INSERT',
            'description' => 'menambahkan user baru: ' . $user->name,
        ]);


        return response()->json(['message' => 'User successfully created and email sent'], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = user::find($id);
        return response()->json([
            'data' => $data

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'editnama' => 'required|string',
            'editemail' => 'required|email|unique:users,email,' . $id,
            'editperan' => 'required|string',
        ]);

        // Update data pengguna berdasarkan $id
        $user = User::findOrFail($id);
        $user->name = $request->editnama;
        $user->email = $request->editemail;
        $user->role = $request->editperan;
        $user->save();

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'UPDATE',
            'description' => 'Update user: ' . $user->name,
        ]);

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::findOrFail($id);
        // Catat aktivitas
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'DELETE',
            'description' => 'hapus user: ' . $user->name,
        ]);

        // Ambil pengguna yang sedang login
        $currentUser = Auth::user();

        // Cek apakah ID pengguna yang akan dihapus sama dengan ID pengguna yang sedang login
        if ($currentUser->id == $id) {
            return response()->json(['status' => 403, 'message' => 'You cannot delete your own account.'], 403);
        }

        // Cari pengguna yang akan dihapus
        $user = User::find($id);

        // Cek apakah pengguna ditemukan
        if (!$user) {
            return response()->json(['status' => 404, 'message' => 'User not found.'], 404);
        }

        // Hapus pengguna
        if ($user->delete()) {
            return response()->json(['success' => true]);
        }

        // Jika terjadi kesalahan saat menghapus
        return response()->json(['status' => 500, 'message' => 'Something went wrong.'], 500);
    }
}
