<?php

namespace App\Http\Controllers;

use App\drinks;
use App\food;
use App\pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pesananController extends Controller
{
    public function getPesanan()
    {
        $food = food::get();
        $drink = drinks::get();
        $pesanan = pesanan::orderBy('created_at', 'desc')
        ->get();

        return view('content.pesanan_all', compact('food','drink','pesanan'));
    }
    public function createSells(Request $request)
    {
        
        $food = food::where('id', $request->makanan_id)->first('price');
        $drink = drinks::where('id', $request->minuman_id)->first('price');

        $makananReady = food::where('id', $request->makanan_id)->first('status');
        $minumanReady = drinks::where('id', $request->minuman_id)->first('status');
        $this->validate($request, [
            'no_meja' => 'required',
            'makanan_id' => 'required',
            'minuman_id' => 'required',
            'no_pesanan' => 'required',
            'status' => 'required',
        ]);
        $pesanan = new \App\pesanan;
        $pesanan->no_meja = $request->no_meja;
        $pesanan->makanan_id = $request->makanan_id;
        $pesanan->minuman_id = $request->minuman_id;
        $pesanan->no_pesanan = $request->no_pesanan.Carbon::now()->format('dmY').'-'.random_int(1,20);
        $pesanan->total_price = $food->price+$drink->price;
        $pesanan->created_by_id = Auth::user()->id;
        $pesanan->status = $request->status;
        // dd($pesanan->no_pesanan);
        if($makananReady->status == "ready" ){
            if($minumanReady->status == "ready"){
                $pesanan->save();
            }else{
                return redirect()->back()->with('success', 'Gagal!! <br> Minuman dalam status not ready!!');
            }
        }else if($makananReady->status != "ready" && $minumanReady->status == "ready"){
            return redirect()->back()->with('success', 'Gagal!! <br> Makanan dalam status not ready!!');
        }else{
            return redirect()->back()->with('success', 'Gagal!! <br> Makanan dan Minuman dalam status not ready!!');
        }
        return redirect()->back();
    }
    public function updatePesanan($id, Request $request)
    {
        $food = food::where('id', $request->makanan_id)->first('price');
        $drink = drinks::where('id', $request->minuman_id)->first('price');

        if($request->isMethod('post')){
            $pesan = $request->all();
            pesanan::where(['id'=> $id])
            ->update([
                'no_meja' => $pesan['no_meja'],
                'makanan_id' => $pesan['makanan_id'],
                'minuman_id' => $pesan['minuman_id'],
                'total_price' => $food->price+$drink->price,
                'status' => $pesan['status'],
            ]);
            return redirect()->back();
        }
    }
    public function deletePesanan($id)
    {
        pesanan::where('id', $id)->delete();
        return redirect()->back();
    }

    
    
}
