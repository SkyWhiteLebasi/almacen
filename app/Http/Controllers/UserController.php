<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['users']=User::paginate(3);
        return view('user.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        /*$campos=[
            'name' =>'required|string|max:100',
            'email' =>'required|email',
            'password' =>'required|string|max:100',
            'rol' =>'required|string|max:100',

        ];



        $this->validate($request, $campos);*/

        //$datosUser = request()->all();
        $datosUser = request()->except('_token','email_verified_at', 'remember_token', 'created_at', 'updated_at'); //trae los datos excepto el token

       
        User::insert($datosUser);
        //return response()->json($datosEmpleado); //trae todos los datos
        return redirect('user');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::findOrFail($id);

        return view('user.edit', compact('user'));
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
        /*$campos=[
            'name' =>'required|string|max:100',
            'email' =>'required|email',
            'rol' =>'required|string|max:100',

        ];

    
        $this->validate($request, $campos);*/

        //
        $datosUser = request()->except('_token','_method');//quitamos el token y metodo


        User::where('id','=',$id)->update($datosUser);
        $user=User::findOrFail($id);
        //return view('empleado.edit', compact('empleado'));
        return redirect('user')->with('mensaje', 'empleado modificado');
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
        $user=User::findOrFail($id);

        User::destroy($id);
        return redirect('user')->with('mensaje', 'empleado eliminado');
    }
}
