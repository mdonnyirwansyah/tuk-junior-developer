<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesanan.form-pesanan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $harga_tiket = 0;
        $total_bayar = 0;

        if ($request->tempat_wisata === "Bukit Suligi") {
            $harga_tiket = 40000;
        } else if ($request->tempat_wisata === "Puncak Kabur") {
            $harga_tiket = 35000;
        }
        $total_bayar = ($harga_tiket * $request->pengunjung_dewasa) + ($harga_tiket * $request->pengunjung_anak / 2);

        $pesanan = new Pesanan();
        $pesanan->nama_lengkap = $request->nama_lengkap;
        $pesanan->nomor_identitas = $request->nomor_identitas;
        $pesanan->no_hp= $request->no_hp;
        $pesanan->tempat_wisata= $request->tempat_wisata;
        $pesanan->tanggal_kunjungan= $request->tanggal_kunjungan;
        $pesanan->pengunjung_dewasa= $request->pengunjung_dewasa;
        $pesanan->pengunjung_anak= $request->pengunjung_anak;
        $pesanan->harga_tiket= $harga_tiket;
        $pesanan->total_bayar= $total_bayar;
        $pesanan->save();

        return response()->json(['success' => $pesanan]);
    }

}
