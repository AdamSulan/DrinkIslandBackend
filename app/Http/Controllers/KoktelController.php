<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Alapanyag;
use App\Models\Ital;
use App\Models\Recept;
use App\Models\Tipus;
use App\Models\User;

class KoktelController extends Controller
{
    
    public function getReceptek()
    {
        $receptek = DB::table('italok')
            ->select('italok.name AS Ital', DB::raw('JSON_OBJECT("recept", GROUP_CONCAT(CONCAT(alapanyagok.name, ": ", receptek.amount))) AS Recept'))
            ->join('receptek', 'italok.id', '=', 'receptek.ital_id')
            ->join('alapanyagok', 'receptek.alapanyag_id', '=', 'alapanyagok.id')
            ->groupBy('italok.id')
            ->get();

        return response()->json($receptek);
    }

    public function getReceptByName($italNeve)
    {
        $recept = DB::table('italok')
            ->select('italok.name AS Ital', DB::raw('JSON_OBJECT("recept", GROUP_CONCAT(CONCAT(alapanyagok.name, ": ", receptek.amount))) AS Recept'))
            ->join('receptek', 'italok.id', '=', 'receptek.ital_id')
            ->join('alapanyagok', 'receptek.alapanyag_id', '=', 'alapanyagok.id')
            ->where('italok.name', $italNeve)
            ->groupBy('italok.id')
            ->first();

        return response()->json($recept);
    }
}
