<?php

namespace App\Http\Controllers;

use App\food;
use Illuminate\Http\Request;

class foodController extends Controller
{
    public function getFoods()
    {
        $food = food::orderBy('created_at', 'desc')
        ->get();
        return view('content.foods', compact('food'));
    }
    public function createFoods(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        $food = new \App\food;
        $food->name = $request->name;
        $food->price = $request->price;
        $food->status = $request->status;
        $food->save();

        return redirect()->back();
    }
    public function updateFoods(Request $request, $id)
    {
        if($request->isMethod('post')){
            $food = $request->all();
            food::where(['id'=> $id])
            ->update([
                'name' => $food['name'],
                'price' => $food['price'],
                'status' => $food['status'],
            ]);
            return redirect()->back();
        }
    }
    public function deleteFoods($id)
    {
        food::where('id', $id)->delete();
        return redirect()->back();
    }
}
