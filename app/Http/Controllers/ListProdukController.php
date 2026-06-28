<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ListProdukController extends Controller
{
   public function show()
{
    $data = Produk::get();
    foreach ($data as $produk) {
        $nama[] = $produk->nama;
        $desc[] = $produk->deskripsi;
        $harga[] = $produk->harga;
        $ids[] = $produk->id;
    }
    return view('list_produk', compact('nama', 'desc', 'harga', 'ids'));
}
    public function simpan(Request $request)
{
    $produk = new Produk();
    $produk->nama = $request->input('nama');
    $produk->deskripsi = $request->input('deskripsi');
    $produk->harga = $request->input('harga');
    $produk->save();

    return redirect()->back()->with('success', 'Data berhasil disimpan!');
}

public function delete($id)
{
    $produk = Produk::where('id', $id)->first();
    if ($produk) {
        $produk->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    } else {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }
}

public function edit($id)
{
    $produk = Produk::where('id', $id)->first();
    return view('edit_produk', compact('produk'));
}

public function update(Request $request, $id)
{
    $produk = Produk::where('id', $id)->first();
    if ($produk) {
        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->save();
        return redirect('/listproduk')->with('success', 'Produk berhasil diupdate.');
    } else {
        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }
}
}