<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        $profile = Profile::first();
        return view('pages.guru.index', compact('gurus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus,nip',
            'email' => 'required|email|max:255|unique:gurus,email',
            'telp' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = time() . '.' . $request->foto->extension();
        $request->foto->storeAs('public/guru/', $filename);

        $validatedData['foto']= $filename;

        Guru::create($validatedData);

        return redirect()->route('guru.index')->with('success', 'Teacher created successfully');
    }

    public function create()
    {
        return view('pages.guru.create');
    }
    public function show($id)
    {
        $gurus = Guru::find($id);
        if ($gurus) {
            return response()->json($gurus);
        } else {
            return response()->json(['message' => 'Teacher not found'], 404);
        }
    }

    public function edit($id)
    {
        $gurus = Guru::find($id);
        if ($gurus) {
            return view('pages.guru.edit', compact('gurus'));
        } else {
            return redirect()->route('guru.index')->with('error', 'Teacher not found');
        }
    }

    public function update(Request $request, $id)
    {
        $gurus = Guru::find($id);
        if ($gurus) {
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'nip' => 'required|string|max:255|unique:gurus,nip,' . $gurus->id,
                'email' => 'required|email|max:255|unique:gurus,email,' . $gurus->id,
                'telp' => 'required|string|max:255',
                'alamat' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('foto')) {
                if ($gurus->foto) {
                    Storage::delete('public/guru/' . $gurus->foto);
                }
                // Handle the image upload
                $filename = time() . '.' . $request->foto->extension();
                $request->foto->storeAs('public/guru/', $filename);
                $validatedData['foto']= $filename;
            }

            $gurus->update($validatedData);
            return redirect()->route('guru.index')->with('success', 'Teacher updated successfully');
        } else {
            return redirect()->route('guru.index')->with('error', 'Teacher not found');
        }
    }

    public function destroy($id)
    {
        $gurus = Guru::find($id);
        if ($gurus) {
            // Delete photo if exists
            if ($gurus->foto) {
                Storage::delete('public/guru/' . $gurus->foto);
            }
            $gurus->delete();
            return redirect()->route('guru.index')->with('success', 'Teacher deleted successfully');
        } else {
            return redirect()->route('guru.index')->with('error', 'Teacher not found');
        }
    }
}
