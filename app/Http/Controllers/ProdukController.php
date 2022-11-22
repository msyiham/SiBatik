<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index ()
    {
        $hmm = [
            [
                "gambar_barang" => "images/batik1.png",
                "nama_barang" => "batik1",
                "harga_barang" => "Rp. 5000",
                "keterangan_barang" => "Batik bla bla bla",
                "stok_barang" => "10"
            ],
            [
                "gambar_barang" => "images/batik1.png",
                "nama_barang" => "batik2",
                "harga_barang" => "Rp. 5000",
                "keterangan_barang" => "Batik bla bla bla",
                "stok_barang" => "10"
            ],
            [
                "gambar_barang" => "images/batik1.png",
                "nama_barang" => "batik3",
                "harga_barang" => "Rp. 5000",
                "keterangan_barang" => "Batik bla bla bla",
                "stok_barang" => "10"
            ],
            [
                "gambar_barang" => "images/batik1.png",
                "nama_barang" => "batik4",
                "harga_barang" => "Rp. 5000",
                "keterangan_barang" => "Batik bla bla bla",
                "stok_barang" => "10"
            ],
            [
                "gambar_barang" => "images/batik1.png",
                "nama_barang" => "batik5",
                "harga_barang" => "Rp. 5000",
                "keterangan_barang" => "Batik bla bla bla",
                "stok_barang" => "10"
            ]
        ];
        return view('user.page.shop') -> with ('hmm',$hmm);
    }
}
