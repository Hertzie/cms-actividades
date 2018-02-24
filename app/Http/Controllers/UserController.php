<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::orderBy('id', 'desc')
                    ->paginate(8);
        return view('administrar.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrar.usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|unique:users'
        ]);

        if(!empty($request->password)){
            $contraseña = trim($request->password);
        }
        else{

            $max = 10;
            $tokens = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $tope = mb_strlen($tokens, '8bit') -1;

            for($i = 0; $i < $max; ++$i){
                $str .= $tokens[random_int(0,$tope)];
            }
            $contraseña = $str;
        }
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($contraseña);
        $usuario->save();

        if($request->roles){
          $user->syncRoles(explode(',', $request->roles));
        }

        return redirect()->route('usuarios.show', $usuario->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::where('id', $id)->with('roles')->first();
        return view('administrar.usuarios.ver', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::where('id',$id)->with('roles')->first();
        $roles = Role::all();
        return view('administrar.usuarios.editar', compact('usuario', 'roles'));
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
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if($request->password_opciones == "auto"){

          $max = 10;
          $tokens = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $str = '';
          $tope = mb_strlen($tokens, '8bit') -1;

          for($i = 0; $i < $max; $i++){
              $str .= $tokens[random_int(0,$tope)];
          }
          $usuario->password = bcrypt($str);
        }
        elseif($request->password_opciones == "manual"){
          $contraseña = bcrypt($request->password);
        }
        $usuario->password = bcrypt($request->password);
        $usuario->activo = $request->activo;
        $usuario->save();

        $usuario->syncRoles(explode(',', $request->roles));

        return redirect()->route('usuarios.show', $id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
