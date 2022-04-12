<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $usuario)
    {
        $this->user =  $usuario;
    }
    
    public function index()
    {
        $Users = auth()->user()->all();
        return view('Admin.User.index', compact('Users'));
    }

    public function register()
    {
        $categorys  = ['Admin TI', 'Admin Manutenção', 'Usuário'];
        $title      = "Novo Usuário";
        //$Users = auth()->user()->all();
        return view('Admin.User.register', compact('categorys','title'));
    }


    public function update(Request $request)
    {
        //$Users = auth()->user()->all();
        return "teste";//view('Admin.User.register');
    }

    public function store(Request $request)
    {
        //$Store = $request->all();
        
        $this->user->name     = $request['nome'];
        $this->user->perfil   = $request['perfil'];
        $this->user->email    = $request['email'];
        if(!empty($request['senha'])){
            $this->user->password = bcrypt($request['senha']);
        }   
        
        
        if(!empty($request['senha'])){
            $save = $this->user->save(); 

            return redirect()
                            ->route('user')
                            ->with('success',"Usuário {$this->user->id} registrado com sucesso");
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao registrar ');
        }
    
        $Users = auth()->user()->all();

        return view('Admin.User.index', compact('Users'));
    }



    public function show($id)
    {
        //$User = user::where('id',$id)->get();
        $title = "Editar Usuário";

        $Users = $this->user::find($id);
        $categorys  = ['Admin TI', 'Admin Manutenção', 'Usuário'];

        return view('Admin.User.register', compact('Users','title','categorys'));
    }

    public function editUser(Request $request)
    {
        $user = $this->user::find($request['id']);

        $user->name = $request['nome'];
        $user->perfil = $request['perfil'];
        $user->email = $request['email'];
        if(!Empty($request['senha'])){
            $user->password = bcrypt($request['senha']);
        }   
        $update = $user->update();        

        $Users = auth()->user()->all();

        if($update){
            return redirect()
                            ->route('user', compact('Users'))
                            ->with('success',"Usuário {$request['id']} Atualizado!");
        }else{
            return redirect()
                            ->back()
                            ->with('error','Erro ao atualizar');
        }
    }
}
