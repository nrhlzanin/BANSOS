<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        return redirect()->back()->with('success', 'Saran berhasil dikirim!');
    }
}
