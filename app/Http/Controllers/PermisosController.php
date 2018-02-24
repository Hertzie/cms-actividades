<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permission::all();
        return view('administrar.permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrar.permisos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->tipo_permiso == 'basico'){
          $this->validate($request, [
              'display_name' => 'required|max:255',
              'name' => 'required|max:255|alphadash|unique:permissions,name',
              'description' => 'sometimes|max:255'
          ]);

          $permiso = new Permission();
          $permiso->name = $request->name;
          $permiso->display_name = $request->display_name;
          $permiso->description = $request->description;
          $permiso->save();

          return redirect()->route('permisos.index');
        }
        elseif($request->tipo_permiso == 'crud'){
          $this->validate($request, [
              'resource' => 'required|min:3|max:20|alpha'
          ]);

          $crud = explode(',', $request->crud_seleccionado);
          if(count($crud)>0){
            foreach ($crud as $c) {
              $slug = strtolower($c) . '-' . strtolower($request->resource);
              $display_name = ucwords($c . " " . $request->resource);
              $description = "Permite al usuario " . strtoupper($c) . ' un ' . ucwords($request->resource);

              $permiso = new Permission();
              $permiso->name = $slug;
              $permiso->display_name = $display_name;
              $permiso->description = $description;
              $permiso->save();
            }
            return redirect()->route('permisos.index');
          }

        }
        else{
          return redirect()->route('permisos.create');
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
        $permiso = Permission::findOrFail($id);
        return view('administrar.permisos.ver', compact('permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permiso = Permission::findOrFail($id);
        return view('administrar.permisos.editar', compact('permiso'));
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
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255'
        ]);

        $permiso = Permission::findOrFail($id);
        $permiso->display_name = $request->display_name;
        $permiso->description = $request->description;
        $permiso->save();


        return redirect()->route('permisos.show', $permiso->id);

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
}
