<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tag;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class TagController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/planta', $fileName);

            $empData = ['tag' => $request->tag,
            'descripcion' => $request->descripcion,
            'operacion' => $request->operacion,
            'ubicacion' => $request->ubicacion,
            'ct' => $request->ct,
            'planta' => $request->planta,
            'area' => $request->area,
            'foto' => $fileName];

            tag::create($empData);
            return redirect('/tags');
           // return response()->json([
             //   'status' => 200

           // ]);

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

    public function edit(tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, tag $tag)
    {
        $request->validate([
            'tag' => 'required', 'descripcion'=>'required', 'operacion'=>'required', 'ubicacion'=>'required', 'ct'=>'required','planta'=>'required'
        ]);
         $prod = $request->all();
         if($imagen = $request->file('foto')){
            $rutaGuardarImg = 'storage/images/planta/';
            $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenProducto);
            $prod['foto'] = "$imagenProducto";
         }else{
            unset($prod['foto']);
         }
         $tag->update($prod);
         return redirect()->route('tags.index');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
        $id = $request->id;
        $emp = tag::find($id);
        if (Storage::delete('public/images/planta/' . $emp->foto)) {
            tag::destroy($id);
        }
    }

    public function destroy($id)
    {

        $emp = tag::find($id);
        if (Storage::delete('public/images/planta/' . $emp->foto)) {
            tag::destroy($id);
        }

        return redirect('/tags');
    }
}
