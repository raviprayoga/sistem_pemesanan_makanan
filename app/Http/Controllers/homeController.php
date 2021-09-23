<?php

namespace App\Http\Controllers;

use App\drinks;
use App\food;
use App\pesanan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function getDashboard()
    {
        $food = food::count();
        $drink = drinks::count();
        $pesanan = pesanan::count();
        $user = Auth::user()->name;
        return view('content.dashboard', compact('user', 'pesanan','food', 'drink'));
    }
    public function getProfile()
    {
        $userName = Auth::user()->name;
        $userEmail = Auth::user()->email;
        $userRole = Auth::user()->jabatan;
        return view('content.profile', compact('userName', 'userEmail', 'userRole'));
    }
    public function getLaporan($id)
    {
        $user = Auth::user();
        $Date = Carbon::now()->format('d-m-Y');
        $pesan = pesanan::where('created_by_id', $id)
        ->get();

        return view('content.laporan', compact('Date','pesan', 'user'));
    }
}
