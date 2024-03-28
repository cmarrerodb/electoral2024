<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trabajadores;
use App\Models\Vtrabajador;

class TrabajadorController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.workers.index')->only('index');
        $this->middleware('can:admin.workers.edit')->only('edit');
        $this->middleware('can:admin.workers.create')->only('create');
        $this->middleware('can:admin.workers.show')->only('show');
        $this->middleware('can:admin.workers.destroy')->only('destroy');
    }

    public function index()
    {
        return view('trabajadores');
    }

    // public function trab_tabla(Request $request)
    // {
    //     info($request->all());
    //     $offset = $request->input('offset', 0);
    //     $limit = $request->input('limit', 10);
    
    //     $query = Vtrabajador::query();
    
    //     // Aplicar el filtrado si existe
    //     if ($request->has('filter')) {
    //         $filters = json_decode($request->filter, true);
    //         foreach ($filters as $column => $value) {
    //             $query->where($column, 'like', '%' . $value . '%');
    //         }
    //     }
    
    //     // Obtener el total de registros antes de aplicar el límite y el desplazamiento
    //     $total = $query->count();
    
    //     // Aplicar el límite y el desplazamiento
    //     $trabajadores = $query->skip($offset)->take($limit)->get();
    
    //     return response()->json([
    //         'total' => $total,
    //         'rows' => $trabajadores
    //     ]);
    // }
    public function trab_tabla(Request $request)
    {
        info($request->all());
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
    
        $query = Vtrabajador::query();
    
        // Aplicar el filtrado si existe
        if ($request->has('filter')) {
            $filters = json_decode($request->filter, true);
            foreach ($filters as $column => $value) {
                $query->where($column, 'like', '%' . $value . '%');
            }
        }
    
        // Obtener el total de registros antes de aplicar el límite y el desplazamiento
        $total = $query->count();
    
        // Aplicar el límite y el desplazamiento
        if ($request->has('limit')) {
            $trabajadores = $query->skip($offset)->take($limit)->get();
        } else {
            $trabajadores = $query->get();
        }
    
        return response()->json([
            'total' => $total,
            'rows' => $trabajadores
        ]);
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
