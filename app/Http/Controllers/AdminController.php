<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Tiket;

class AdminController extends Controller
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

     public function index(){
         return view('admin.index');
     }

     public function pemesanan(){
        $pemesanan = Pemesanan::all();
        return view('admin.pemesanan.index', compact('pemesanan'));
     }

     public function pemesanantiket(Request $request, $id) {
        $pemesanan = Pemesanan::find($id);
        $pemesanan->delete();
        $random = uniqid();
        $tiket = Tiket::create([
            'namapembeli' => $request->get('namapembeli'),
            'status' => $request->get('status'),
            'jenistiket' => $request->get('jenistiket'),
            'asal' => $request->get('asal'),
            'tujuan' => $request->get('tujuan'),
            'kadaluarsa' => $request->get('kadaluarsa'),
            'no_tiket' => $random,
        ]);
        return redirect('/admin/pemesanan');
     }
}
