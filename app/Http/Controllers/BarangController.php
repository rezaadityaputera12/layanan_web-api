<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan semua barang
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    // Menampilkan halaman untuk menambah barang baru
    public function create()
    {
        return view('barang.create');
    }

    // Menyimpan barang baru ke dalam database
    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->save();

        return redirect()->route('barang.index');
    }

    // Menampilkan detail suatu barang
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    // Menampilkan halaman untuk mengedit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    // Mengupdate barang di dalam database
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->save();

        return redirect()->route('barang.index');
    }

    // Menghapus barang dari database
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index');
    }
}