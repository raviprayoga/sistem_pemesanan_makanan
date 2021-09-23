<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\drinks;
use App\food;
use App\pesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class pesananActiveController extends Controller
{
    // pesanan active only
    public function pesananactive()
    {
        $food = food::get();
        $drink = drinks::get();
        $pesanan_active = pesanan::where('status', 'active')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('content.pesanan-active', compact('food','drink','pesanan_active'));
    }
    public function createpesanActive(Request $request)
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
        $pesanan_active = new \App\pesanan;
        $pesanan_active->no_meja = $request->no_meja;
        $pesanan_active->makanan_id = $request->makanan_id;
        $pesanan_active->minuman_id = $request->minuman_id;
        $pesanan_active->no_pesanan = $request->no_pesanan.Carbon::now()->format('dmY').'-'.random_int(1,20);
        $pesanan_active->total_price = $food->price+$drink->price;
        $pesanan_active->created_by_id = Auth::user()->id;
        $pesanan_active->status = $request->status;
        // dd($makananReady->status);
        if($makananReady->status == "ready" ){
            if($minumanReady->status == "ready"){
                $pesanan_active->save();
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
    public function updatepesananactive($id, Request $request)
    {
        $food = food::where('id', $request->makanan_id)->first('price');
        $drink = drinks::where('id', $request->minuman_id)->first('price');

        if($request->isMethod('post')){
            $pesan_active = $request->all();
            if(Auth::user()->jabatan == 'pelayan'){
                pesanan::where(['id'=> $id])
                ->update([
                'no_meja' => $pesan_active['no_meja'],
                'makanan_id' => $pesan_active['makanan_id'],
                'minuman_id' => $pesan_active['minuman_id'],
                'total_price' => $food->price+$drink->price,
            ]);
            }else{
                pesanan::where(['id'=> $id])
                ->update([
                'no_meja' => $pesan_active['no_meja'],
                'makanan_id' => $pesan_active['makanan_id'],
                'minuman_id' => $pesan_active['minuman_id'],
                'total_price' => $food->price+$drink->price,
                'status' => $pesan_active['status'],
            ]);
            }
            return redirect()->back();
        }
    }
    public function deletePesananActive($id)
    {
        pesanan::where('id', $id)->delete();
        return redirect()->back();
    }
}
