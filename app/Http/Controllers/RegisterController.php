<?php

namespace App\Http\Controllers;

use App\Models\ref_dosen;
use App\Models\register;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\ref_jurusans;
use App\Models\ref_prodis;
use App\Models\RefDosenkbk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kbk_jur = ref_jurusans::all();
        $kbk_pro = ref_prodis::all();
        // $dosenkbk = RefDosenkbk::latest()->paginate(10);
        $statuses = [
            '1' => 'Aktif',
            '0' => 'Tidak-Aktif'
        ];
        return view('register')->with([
            'data_jur' => $kbk_jur,
            'data_pro' => $kbk_pro,
            'statuses' => $statuses
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:18',
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:users|max:255',
            'password' => ['required', 'string', 'max:8', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            'captcha' => 'required|captcha'
        ], [
            'captcha.required' => 'Captcha wajib diisi.',
            'captcha.captcha' => 'Captcha tidak valid.'
        ]);

        // $validated['password'] = Hash::make($validated['password']);
        // $validated['email_verified_at'] = now();
        // $validated['remember_token'] = Str::random(10);
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at'=>now()
        ];

        $dosen = [
            'nip' => $request->nip,
            'nama' => $request->name,
            'nidn' => $request->nidn,
            'jurusan' => $request->id_jurusan,
            'prodi' => $request->id_prodi,
            'gender' => $request->gender,
            'email' => $request->email
        ];

        User::create($user);
        ref_dosen::create($dosen);

        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(register $register)
    {
        //
    }
}
