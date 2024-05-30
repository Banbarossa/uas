<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {

        $setting = Setting::latest()->pluck('open_form')->first();
        return view('welcome', compact('setting'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'kelas' => 'required',
            'file' => 'required|file|mimes:xls,xlsx|max:2048',
            'password' => 'required',
        ], [
            'name.required' => 'Nama Wajib diisi',
            'kelas.required' => 'Kelas Wajib Diisi',
            'file.required' => 'file wajib di upload',
            'file.file' => 'harus jenis File',
            'file.mimes' => 'file yang diupload harus berextensi xls/xlsx',
            'file.mimes' => 'file yang diupload max 2 MB',
            'password.required' => 'password wajib diisi',
        ]);

        $tingkat = explode('_', $request->kelas);

        $password = $request->password;
        if ($password != "bismillah") {

            return redirect()->back()->with('error', 'Password tidak cocok');
        }

        $pathName = $request->kelas . "_" . $request->name . "_" . $request->file->hashName();
        $request->file->storeAs('document', $pathName);

        Storage::put('public', $request->file);

        return redirect()->back()->with('success', 'Berhasil mengirimkan jawaban, Jazaakumullahukhairan');
    }
}
