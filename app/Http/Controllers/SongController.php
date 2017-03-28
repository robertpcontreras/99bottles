<?php

namespace App\Http\Controllers;

use App\BottlesSong;

class SongController extends Controller
{
    public function index()
    {
        return view('99bottles');
    }

    public function lyrics()
    {
        $song = request('verses') === null ? new BottlesSong : new BottlesSong(request('verses'));

        return ['lyrics' => (string) $song];
    }
}
