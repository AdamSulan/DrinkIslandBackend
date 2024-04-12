<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipus;
use Illuminate\Support\Facades\DB;

class TipusController extends Controller
{
    public function addTipus(Request $request){
        $request->validate([
            'italok_id' => 'required',
            'teli' => 'required',
            'nyari' => 'required',
            'edes' => 'required',
            'savanyu' => 'required',
            'keseru' => 'required',
            'alkoholos' => 'required',
            'alkoholmentes' => 'required'
        ]);
        $tipus=new Tipus;
        $tipus->italok_id=$request->input('italok_id');
        $tipus->teli=$request->input('teli');
        $tipus->nyari=$request->input('nyari');
        $tipus->edes=$request->input('edes');
        $tipus->savanyu=$request->input('savanyu');
        $tipus->keseru=$request->input('keseru');
        $tipus->alkoholos=$request->input('alkoholos');
        $tipus->alkoholmentes=$request->input('alkoholmentes');
        $tipus->save();
        return response()->json(['message'=>'Tipus sikeresen hozzáadva', 'data'=>$tipus], 201);
    }
    public function getTipus(Request $tipus){
        $current=Tipus::where("italok_id",$tipus->input('italok_id'))->first();
        return $current;
    }
    public function getTipusok(){
        $tipusok = DB::table('tipus')->get();
        return response()->json($tipusok);
    }
}
