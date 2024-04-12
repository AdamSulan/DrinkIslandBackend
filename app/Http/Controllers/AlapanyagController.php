<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alapanyag;
use Illuminate\Support\Facades\DB;

class AlapanyagController extends Controller
{
    public function addAlapanyag(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        $alapanyag=new Alapanyag;
        $alapanyag->name=$request->input('name');
        $alapanyag->save();
        return response()->json(['message'=>'Alapanyag sikeresen hozzáadva', 'data'=>$alapanyag], 201);
    }
    
    public function getAlapanyag(Request $alapanyagName){
        $current=Alapanyag::where("name",$alapanyagName->input('name'))->first();
        return $current->id;
    }

    public function getAlapanyagok(){
        $alapanyagok = DB::table('alapanyagok')->get();
        return response()->json($alapanyagok);
    }


    
}
