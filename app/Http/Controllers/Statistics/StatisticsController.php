<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use App\Models\Pathology;
use App\Models\Surgery;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function total_suspicions(){

        $info = DB::table('symptom_user')
        ->select(DB::raw('count(symptom_id) as total_symptom, symptom_id'))
        ->orderBy('total_symptom','desc')
        ->groupBy('symptom_id')
        ->get();
        $total = DB::table('symptom_user')->count();
        $data = [];

        foreach($info as $i){
            $d = [
                'total'=>$i->total_symptom,
                'promedio'=>100*round(($i->total_symptom/$total),4),
                'sintoma'=>Symptom::find($i->symptom_id)->name,
                'pacientes'=>Symptom::find($i->symptom_id)->users,
            ];
            $data[]=$d;
        }


      return view('statistics.total-suspicions',compact('data','total'));
    }

    public function total_pathologies(){
        $info = DB::table('pathology_user')
        ->select(DB::raw('count(pathology_id) as total_pathology, pathology_id'))
        ->orderBy('total_pathology','desc')
        ->groupBy('pathology_id')
        ->get();
        $total = DB::table('pathology_user')->count();
        $data = [];

        foreach($info as $i){
            $d = [
                'total'=>$i->total_pathology,
                'promedio'=>100*round(($i->total_pathology/$total),4),
                'patologia'=>Pathology::find($i->pathology_id)->name,
                'pacientes'=>Pathology::find($i->pathology_id)->users,
            ];
            $data[]=$d;
        }



      return view('statistics.total-pathologies',compact('data','total'));

    }

    public function total_surgeries(){
        $info = DB::table('surgery_user')

        ->select(DB::raw('count(surgery_id) as total_surgery, surgery_id'))
        ->orderBy('total_surgery','desc')
        ->groupBy('surgery_id')
        ->get();

        $total = DB::table('surgery_user')->count();
        $data = [];


        foreach($info as $i){
            $prueba = Surgery::find(11)->users;
            // dd($prueba);
            $d = [

                'total'=>$i->total_surgery,
                'promedio'=>100*round(($i->total_surgery/$total),4),
                'cirugia'=>Surgery::find($i->surgery_id)->name,
                'pacientes'=>Surgery::find($i->surgery_id)->users
            ];

            $data[]=$d;
        }
        //dd($data);
        return view('statistics.total-surgeries', compact('data','total'));

    }
}
