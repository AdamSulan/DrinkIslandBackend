<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ital;
use Illuminate\Support\Facades\DB;

class ItalController extends Controller
{
    public function addItal(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $ital=new Ital;
        $ital->name=$request->input('name');
        $ital->save();
        return response()->json(['message'=>'Ital sikeresen hozzáadva', 'data'=>$ital], 201);
    }
    public function getItal(Request $ital){
        $current=Ital::where("name",$ital->input('name'))->first();
        return $current->id;
    }
    public function getItalok(){
        $italok = DB::table('italok')->get();
        return response()->json($italok);
    }
}
