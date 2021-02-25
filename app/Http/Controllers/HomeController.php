<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function tiket()
    {
        return view('user.tiket.index');
    }

    public function pesantiket()
    {
        return view('user.pemesanan.tiket');
    }
    public function tiketproses(Request $request)
    {
        $this->validate($request, [
            'pembeli' => 'required',
            'jenistiket' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'harga' => 'required',
            'namarekening' => 'required',
        ]);
        Pemesanan::create([
            'pembeli' => $request->get('pembeli'),
            'jenistiket' => $request->get('jenistiket'),
            'asal' => $request->get('asal'),
            'tujuan' => $request->get('tujuan'),
            'harga' => $request->get('harga'),
            'namarekening' => $request->get('namarekening'),
        ]);


        return redirect()->back()->with(['success' => 'Pesan Tiket Berhasil']);
    }
}
