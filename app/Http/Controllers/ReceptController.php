<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recept;

class ReceptController extends Controller
{
    public function addRecept(Request $request){
        $request->validate([
            'italok_id' => 'required',
            'alapanyag_id' => 'required',
            'amount' => 'required'
        ]);
        $recept=new Recept;
        $recept->italok_id=$request->input('italok_id');
        $recept->alapanyag_id=$request->input('alapanyag_id');
        $recept->amount=$request->input('amount');
        $recept->save();
        return response()->json(['message'=>'Recept sikeresen hozzáadva', 'data'=>$recept], 201);
    }
}
