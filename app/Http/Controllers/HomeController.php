<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kategori;
use App\Models\Kategori as ModelsKategori;
use App\Models\Transaksi;

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

    public function index()
    {
        return view('home');
    }

    public function kategori()
    {
        $kategori = ModelsKategori::all();
        //$kategori = ModelsKategori::orderBy('id','ASC')->LIMIT(2)->get();
        return view('kategori',['kategori' => $kategori]);
    }
    public function kategori_tambah()
    {
        return view('kategori_tambah');
    }
    public function kategori_aksi(Request $data)
    {
        $data->validate([
            'kategori' => 'required|unique:kategori,kategori'
        ]);
        $kategori = $data->kategori;

        ModelsKategori::insert([
            'kategori' => $kategori
        ]);

        return redirect('kategori')->with("sukses", "Kategori berhasil tersimpan");
    }
    public function kategori_edit($id)
    {
        $kategori = ModelsKategori::find($id);
        return view('kategori_edit',['kategori' => $kategori]);
    }
    public function kategori_update($id, Request $data)
    {
        //form validasi
        $data->validate([
            'kategori'=>'required'
        ]);

        $nama_kategori = $data->kategori;

        //update kategori
        $kategori = ModelsKategori::find($id);
        $kategori->kategori = $nama_kategori;
        $kategori->save();

        //alihkan halaman ke halaman kategori
        return redirect('kategori')->with("sukses","Kategori berhasil diubah");
    }

    public function kategori_hapus($id)
    {
        $kategori = ModelsKategori::find($id);
        $kategori->delete();
        return redirect('kategori')->with("sukses", "Kategori berhasil dihapus");
    }

    public function transaksi()
    {
        //mengambil data transaksi
        $transaksi=Transaksi::all();

        //passing data transkasi ke view transaksi.blade.php
        return view('transaksi', ['transaksi' =>$transaksi]);
    }
}