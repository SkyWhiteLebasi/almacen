<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos=Producto::all();
       // $categ=Categoria::all();
        
        // $datos['productos']=Producto::paginate(5);
        return view('producto.index',compact('productos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categ=Categoria::all();
        //dd($categ);//para ver q te esta retornando
        return view('producto.create', compact('categ'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'nombre_pr' =>'required|string|max:100',
            'foto' =>'required|max:10000|mimes:jpeg,png,jpg',
            'stock' =>'required|int|max:100000',
            'desc_pr' =>'nullable|string',
            // 'medida_id' =>'nullable|string',
            'categoria_id' =>'required|string',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos,$mensaje);

        //$datosEmpleado = request()->all();
        $datosProducto = request()->except('_token'); //trae los datos excepto el token

        if($request->hasFile('foto')){ //ára traerme la foto
            $datosProducto['foto']=$request->file('foto')->store('uploads','public'); 
        }
        Producto::insert($datosProducto);
        //return response()->json($datosEmpleado); //trae todos los datos
        return redirect('producto')->with('mensaje', 'Producto agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
        return view('producto.add', compact('producto'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto=Producto::findOrFail($id);

        return view('producto.edit', compact('producto'));
    }

    public function add($id)
    {
        $producto=Producto::findOrFail($id);

        return view('producto.add', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'nombre_pr' =>'required|string|max:100',
            'medida_id' =>'nullable|string|max:100',
            'stock' =>'required|int|max:100000',
            'descr_pr' =>'nullable|string',

        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
      
        ];
        if($request->hasFile('foto')){
             $campos=['foto' =>'required|max:10000|mimes:jpeg,png,jpg'];
             $mensaje=['foto.required'=>'La foto requerida'];
        }
        $this->validate($request, $campos,$mensaje);

        //
        $datosProducto = request()->except('_token','_method');//quitamos el token y metodo

        if($request->hasFile('foto')){ //ára traerme la foto
            $producto=Producto::findOrFail($id);
            Storage::delete('public/'.$producto->foto);
            $datosProducto['foto']=$request->file('foto')->store('uploads','public'); 
        }

        Producto::where('id','=',$id)->update($datosProducto);
        $producto=Producto::findOrFail($id);
        //return view('empleado.edit', compact('empleado'));
        return redirect('producto')->with('mensaje', 'productin modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto=Producto::findOrFail($id);
        if(Storage::delete('public/'.$producto->foto)){
            Producto::destroy($id);
        }

        //Empleado::destroy($id);
        return redirect('producto')->with('mensaje', 'productin eliminado');
    }
}
