<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = [
            'nama' => 'Aminy Ghaisan Nurdiniyah',
            'prodi' => 'D4 - Teknik Informatika',
            'nim' => '2141720163',
            'tanggal' => '10 September 2025',
            'foto' => asset('images/profile.png'),
        ];

        return view('about', compact('about'));
    }
}
