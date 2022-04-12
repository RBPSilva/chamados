<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        //dd((auth()->user()->perfil));
        
        if(auth()->user()->perfil == "Admin TI"){
            $Chamado = DB::table('chamados')
                ->select('status', DB::raw('count(status) as qtd'))
                //->where('user_id',auth()->user()->id)
                ->groupBy('status')->get();

            $mes = date('m');
            $ano = date('Y');
            $chamadoMes = DB::table('chamados')
                ->select('status',DB::raw('count(status) as qtd')  )          
                ->whereMonth('updated_at',$mes) 
                ->whereYear('updated_at',$ano)               
                ->groupBy('status')->get();
        }else{
            $Chamado = DB::table('chamados')
                                ->select('status', DB::raw('count(status) as qtd'))
                                ->where('user_id',auth()->user()->id)
                                ->groupBy('status')->get();

            $mes = date('m');
            $ano = date('Y');
            $chamadoMes = DB::table('chamados')
                ->select('status',DB::raw('count(status) as qtd')) 
                ->where('user_id',auth()->user()->id)          
                ->whereMonth('updated_at',$mes) 
                ->whereYear('updated_at',$ano) 
                           
                ->groupBy('status')->get();
        }        
        
        $var = count($chamadoMes);

        for ($i=0; $i < $var ; $i++) { 
            if($chamadoMes[$i]->status == "Aberto"){
                $Aberto = $chamadoMes[$i]->qtd;
            }elseif($chamadoMes[$i]->status == "Desenvolvimento"){
                $Desenvolvimento = $chamadoMes[$i]->qtd;
            }elseif($chamadoMes[$i]->status == "Validar"){
                $Validar = $chamadoMes[$i]->qtd;
            }elseif($chamadoMes[$i]->status == "Fechado"){
                $Fechado = $chamadoMes[$i]->qtd;
            }
        }

        if(Empty($Aberto)){
            $Aberto = 0;
        }
        if(Empty($Desenvolvimento)) {
            $Desenvolvimento = 0;
        }
        if(Empty($Validar)){
            $Validar = 0;
        }
        if(Empty($Fechado)){
            $Fechado = 0;
        }
 
        $data = array(  'Mes' => $mes,
                        'Aberto' => $Aberto, 
                        'Desenvolvimento' => $Desenvolvimento,
                        'Validar' => $Validar,
                        'Fechado' => $Fechado,
        );
        //dd($data);
        return view('Admin.home.index', compact('Chamado','data'));
    }
}
