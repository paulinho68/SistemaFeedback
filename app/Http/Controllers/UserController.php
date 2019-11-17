<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Contrato;

class UserController extends Controller
{


    /*
    * @var Perfis
    * @var User
    */
    private $perfis;
    private $user;

    
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->perfis = [
            "admin" => "admin",
            "cliente" => "cliente",
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if(auth()->user()->id == 1){
            $users = $this->user::orderBy('name','ASC')->paginate(15);
        }else{
            $users = $this->user::where('id','>',1)->orderBy('name','ASC')->paginate(15);
        }
        return view('users.users_index', compact('users'));
            //->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //$roles = Role::pluck('display_name','id');
        $perfis = $this->perfis;
        return view('users.users_create',compact('perfis'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $messages = [
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo e-mail é obrigatório!',
            'password.required' => 'O campo senha é obrigatório!',
            'perfil.required' => 'O campo perfil é obrigatório!',
            'status.required' => 'O campo status é obrigatório!',
        ];
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'perfil' => 'required',
            'status' => 'required',
        ], $messages);
        
        $user = $this->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->perfil = $request->perfil;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('user.index')->with('message', 'Registro criado com sucesso!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = $this->user::findOrFail($id);
        return view('users.users_show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = $this->user::findOrFail($id);
        $perfis = $this->perfis;
        return view('users.users_edit',compact('user', 'perfis'));
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

        $messages = [
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo e-mail é obrigatório!',
            'password.required' => 'O campo senha é obrigatório!',
            'perfil.required' => 'O campo perfil é obrigatório!',
            'status.required' => 'O campo status é obrigatório!',
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id, //??
            'password' => 'same:confirm-password',
            'perfil' => 'required',
            'status' => 'required',
        ], $messages);

        $user = $this->user::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){ 
            $user->password = Hash::make($request->password);
        }
        $user->perfil = $request->perfil;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('user.index')->with('message', 'Registro atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('message','Registro excluído com sucesso!');
    }
    */
    
    
    public function self_edit_password()
    {
        $user_id = Auth::id();
        $user = $this->user::findOrFail($user_id);
        return view('users.users_self_edit_password',compact('user'));
    }
    
    
    public function self_update_password(Request $request)
    {

       $user_id = Auth::id();

       $messages = [
            'password_old.required'         => 'O campo senha antiga é obrigatório!',
            'password_new.required'         => 'O campo senha nova é obrigatório e deve ter no mínimo 6 (seis) caracteres!',
        ];
        
        $validatedData = $request->validate([
            'password_old'      => 'required',
            'password_new'      => 'required|min:6',
        ], $messages);

        $users = $this->user::findOrFail($user_id);

        if(Hash::check($request->password_old, $users->password)){
            $users->password = Hash::make($request->password_new);
            $users->save();
            return redirect()->route('self_edit_password')->with('message', 'Senha alterada com sucesso!');
        }else{
            return redirect()->route('self_edit_password')->with('message', 'A senha antiga não confere!');
        }
        
    }

}