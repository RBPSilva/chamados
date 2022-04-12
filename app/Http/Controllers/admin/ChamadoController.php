<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\chamado;
use App\Models\ChamadoItem;
use DB;
Use App\User;
Use Storage;

class ChamadoController extends Controller
{
    protected $chamado;

    public function __construct(chamado $chamado)
    {
        $this->chamado =  $chamado;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys  = ['Totvs', 'SalesForce', 'Manutenção TI', 'Manutenção Diversas', 'Dúvidas' ];

        return view('Admin.chamado.index', compact('categorys'));
    }

    public function register()
    {
        $title = "Chamados Abertos";

        if(auth()->user()->perfil == "Admin TI"){
            $Chamados = chamado::where('status','Aberto')->orderBy('id','desc')->get();
        }else{
            $Chamados = chamado::where([
                        ['status','Aberto'],
                        ['user_id',auth()->user()->id],
                        ])
                            ->orderBy('id','desc')->get();
        }
        return view('Admin.chamado.chamado', compact('title','Chamados'));
    }

    public function fechado()
    {
        $title = "Chamados fechados";

        if(auth()->user()->perfil == "Admin TI"){
            $Chamados = chamado::where('status','Fechado')->orderBy('id','desc')->get();
        }else{
            $Chamados = chamado::where([
                        ['status','Fechado'],
                        ['user_id',auth()->user()->id]
                        ])
                            ->orderBy('id','desc')->get();
        }

        return view('Admin.chamado.chamado', compact('title','Chamados'));
    }
    
    
    
    
    public function desenvolvimento()
    {
        $title = "Chamados em desenvolvimento";

        if(auth()->user()->perfil == "Admin TI"){
            $Chamados = chamado::where('status','Desenvolvimento')->orderBy('id','desc')->get();
        }else{
            $Chamados = chamado::where([
                        ['status','Desenvolvimento'],
                        ['user_id',auth()->user()->id]
                        ])
                            ->orderBy('id','desc')->get();
        }

        return view('Admin.chamado.chamado', compact('title','Chamados'));
    }
    
    public function validar()
    {
        $title = "Chamados à validar";

        if(auth()->user()->perfil == "Admin TI"){
            $Chamados = chamado::where('status','Validar')->orderBy('id','desc')->get();
        }else{
            $Chamados = chamado::where([
                        ['status','Validar'],
                        ['user_id',auth()->user()->id]
                        ])
                            ->orderBy('id','desc')->get();
        }

        return view('Admin.chamado.chamado', compact('title','Chamados'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
           
            $this->chamado->user_id = auth()->user()->id;
            $this->chamado->assunto = $request->assunto;
            $this->chamado->categoria = $request->categoria;
            $this->chamado->ultInteracao = date('Y-m-d H:i:s');
            $this->chamado->status = "Aberto";
            $this->chamado->save();

            $chamadoItem = new ChamadoItem();

            if($request->hasFile('image') && $request->file('image')->isValid()){
                $name = $this->chamado->id .'-'. date('Y-m-ds');
                $extencao = $request['image']->extension();
                $nameFile = "{$name}.{$extencao}";
                
                $chamadoItem->image = $nameFile;

                $upload = $request['image']->storeAs('chamadoItens', $nameFile);
                
                if(!$upload)
                        return redirect()
                            ->back()
                            ->with('error','Erro upload da imagem');
                
            }
            
            $chamadoItem->chamado_id = $this->chamado->id;
            $chamadoItem->user_id = auth()->user()->id;
            $chamadoItem->descricao = $request->descricao;
            $chamadoItem->save();
            
        if($this->chamado && $chamadoItem ){
            DB::commit();

            return redirect()
                            ->route('chamados')
                            ->with('success','Chamado cadastrado!');
        }else{
            DB::rollback();

            return redirect()
                            ->back()
                            ->with('error','Erro ao abrir o chamado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $Chamado = chamado::where('id',$id)->get();

        $Chamado_itens = DB::table('chamado_items')
                ->join('chamados', 'chamados.id', '=', 'chamado_items.chamado_id')
                ->leftJoin('users', 'users.id', '=', 'chamado_items.user_id')
                ->select('users.name', 'chamados.id','chamados.status','chamado_items.descricao', 'chamado_items.created_at', 'chamado_items.image')
                ->where('chamado_items.chamado_id',$id)
                ->orderBy('chamado_items.created_at','desc')
                ->paginate(3); 

        $cat_status  = ['Aberto', 'Desenvolvimento', 'Validar', 'Fechado' ];

        if (auth()->user()->perfil == "Admin TI") {
            $view_status = "";
        }else{
            $view_status = 'disabled="" ';
        }
        
        
        return view('Admin.chamado.chamadoItens', compact('Chamado_itens','Chamado','cat_status','view_status'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id, Request $request)
    {
       
        
    }

    public function editarChamado( Request $request)
    {

        $chamado = $this->chamado::find($request['id']);
        
        if(!Empty($request['descricao'])){    
            DB::beginTransaction();

            $chamado->status =$request['status'];
            $chamado->ultInteracao = date('Y-m-d H:i:s');
            $chamado->update();

            $chamadoItem = new ChamadoItem();

            if($request->hasFile('image') && $request->file('image')->isValid()){
                $name = $request['id'] .'-'. date('Y-m-ds');
                $extencao = $request['image']->extension();
                $nameFile = "{$name}.{$extencao}";
                
                $chamadoItem->image = $nameFile;

                $upload = $request['image']->storeAs('chamadoItens', $nameFile);
                
                if(!$upload)
                        return redirect()
                            ->back()
                            ->with('error','Erro upload da imagem');    
            } 

            $chamadoItem->chamado_id = $chamado->id;
            $chamadoItem->user_id = auth()->user()->id;
            $chamadoItem->descricao = $request['descricao'];
            $chamadoItem->save();
        
            if($this->chamado && $chamadoItem ){
                DB::commit();

                if($request['status'] == "Aberto"){
                    $redirect = "chamados";
                }elseif ($request['status'] == "Desenvolvimento") {
                    $redirect = "desenvolvimento";
                }elseif ($request['status'] == "Validar") {
                    $redirect = "validar";
                }elseif ($request['status'] == "Fechado") {
                    $redirect = "fechado";
                }

                return redirect()
                                ->route($redirect)
                                ->with('success',"Chamado {$request['id']} Atualizado!");
            }else{
                DB::rollback();

                return redirect()
                                ->back()
                                ->with('error','Erro ao responder');
            }
        }else {
            return redirect()
                                ->back()
                                ->with('error','Descrição está sem preenchimento');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*******************************************
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *******************************************/
    public function donloadAnexo($imageid)
    { 
        return Storage::download('/chamadoItens/'.$imageid);
    }
}
