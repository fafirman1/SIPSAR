<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::all();
        $profile = Profile::first();
        return view('pages.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        return view('pages.pengumuman.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required|string|max:255',
            'isi' => 'required|string',
            'lampiran' => 'required|file|mimes:zip,pdf,doc,docx,jpg,png|max:2048', // Menambahkan validasi tipe file dan ukuran maksimal
        ]);

        if ($request->hasFile('lampiran')) {
            // Dapatkan file dari request
            $file = $request->file('lampiran');
            // Simpan file di folder public/pengumuman dan ambil nama file
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/pengumuman/', $filename);
            // Simpan URL lengkap dari file dalam validatedData
            $validatedData['lampiran'] = 'https://www.sipsar.my.id/storage/pengumuman/' . $filename;
        }

        Pengumuman::create($validatedData);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman created successfully');
    }

    public function show(Pengumuman $pengumuman)
    {
    }

    public function edit(Pengumuman $pengumuman)
    {
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        if ($pengumuman) {
            // Delete lampiran if exists
            if ($pengumuman->lampiran) {
                // Extract the filename from the URL
                $filename = basename($pengumuman->lampiran);
                Storage::delete('public/pengumuman/' . $filename);
            }
            $pengumuman->delete();
            return redirect()->route('pengumuman.index')->with('success', 'Data deleted successfully');
        } else {
            return redirect()->route('pengumuman.index')->with('error', 'Data not found');
        }
    }
}

