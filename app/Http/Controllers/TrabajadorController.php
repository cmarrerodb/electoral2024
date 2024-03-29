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
    public function trab_tabla(Request $request)
    {
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
        $total = $query->count();
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
        $trabajador = Trabajadores::where('cedula', '=', $id)->first(); // Buscar el registro por cédula
        if ($trabajador) {
            $trabajador->deleted_at = now(); // Sustituir el valor de "deleted_at" por el timestamp actual
            $trabajador->save(); // Guardar el registro actualizado
        }
        return json_encode($trabajador);
    }
    public function check(Request $request) {
        // dd($request->all());
        $cedula = $request->cedula;
        // $voto = $request->voto === 'SI' ? true : false; // Convertir 'SI' a true, de lo contrario a false
        $voto = true; // Convertir 'SI' a true, de lo contrario a false
        $horaVoto = $request->hora_voto;
    
        $trabajador = Trabajadores::where('cedula', '=',$cedula)->first(); // Buscar el trabajador por su cédula
        // dd($trabajador);
        // if ($trabajador) {
            // $trabajador->voto = 't'; // Actualizar el campo voto
            $trabajador->voto = $voto; // Actualizar el campo voto
            // $trabajador->hora_voto = true; // Actualizar el campo hora_voto
            $trabajador->hora_voto = $horaVoto; // Actualizar el campo hora_voto
            $trabajador->save(); // Guardar los cambios en la base de datos
            return json_encode($trabajador);
            // Otra lógica después de actualizar los campos
        // } else {
        //     // Manejar el caso en el que no se encuentra el trabajador con la cédula proporcionada
        // }

    }
}
