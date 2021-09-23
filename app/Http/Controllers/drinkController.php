<?php

namespace App\Http\Controllers;

use App\drinks;
use Illuminate\Http\Request;

class drinkController extends Controller
{
    public function getDrinks()
    {
        $drink = drinks::orderBy('created_at', 'desc')
        ->get();
        return view('content.drink', compact('drink'));
    }
    public function createDrinks(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        $drink = new \App\drinks;
        $drink->name = $request->name;
        $drink->price = $request->price;
        $drink->status = $request->status;
        $drink->save();

        return redirect()->back();
    }
    public function updateDrinks(Request $request, $id)
    {
        if($request->isMethod('post')){
            $food = $request->all();
            drinks::where(['id'=> $id])
            ->update([
                'name' => $food['name'],
                'price' => $food['price'],
                'status' => $food['status'],
            ]);
            return redirect()->back();
        }
    }
    public function deleteDrinks($id)
    {
        drinks::where('id', $id)->delete();
        return redirect()->back();
    }
}
