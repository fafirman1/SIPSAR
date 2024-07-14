<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $profile = Profile::first();
        return view('pages.event.index', compact('events'));
    }

    public function create()
    {
        return view('pages.event.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required|string|max:255',
            'content' => 'required|string',
            'foto' => 'required|image|mimes:jpg,png|max:2048', // Menambahkan validasi tipe file dan ukuran maksimal
        ]);

        if ($request->hasFile('foto')) {
            // Dapatkan file dari request
            $file = $request->file('foto');
            // Simpan file di folder public/pengumuman dan ambil nama file
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/event/', $filename);
            // Simpan nama file dalam validatedData
            $validatedData['foto'] = $filename;
        }

        Event::create($validatedData);

        return redirect()->route('event.index')->with('success', 'Teacher created successfully');
    }

    public function show(Event $event)
    {
    }

    public function edit(Event $event)
    {
    }

    public function update(Request $request, Event $event)
    {
    }

    public function destroy($id)
    {
        $events = Event::find($id);
        if ($events) {
            // Delete photo if exists
            if ($events->foto) {
                Storage::delete('public/event/' . $events->foto);
            }
            $events->delete();
            return redirect()->route('event.index')->with('success', 'Data deleted successfully');
        } else {
            return redirect()->route('event.index')->with('error', 'Data not found');
        }
    }
}
