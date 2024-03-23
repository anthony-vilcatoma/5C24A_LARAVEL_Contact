<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactos = Contacto::all();
        return view('contacts.index',['contactos'=>$contactos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'ape_paterno' => 'required|string|max:255',
            'ape_materno' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        // Crear una nueva instancia del modelo Contacto
        $contacto = new Contacto();
        $contacto->nombre = $request->name;
        $contacto->apellido_paterno = $request->ape_paterno;
        $contacto->apellido_materno = $request->ape_materno;
        $contacto->numero = $request->telefono;

        // Guardar el nuevo contacto en la base de datos
        $contacto->save();

        // Redireccionar al usuario a la lista de contactos con un mensaje de éxito
        return redirect()->route('contactos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = Contacto::findOrFail($id);
        return view('contacts.edit',['contact'=>$contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacto $contacto,$id)
    {

        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'ape_paterno' => 'required|string|max:255',
            'ape_materno' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        // Buscar el contacto existente
        $contacto = Contacto::findOrFail($id);

        // Actualizar el contacto con los nuevos valores
        $contacto->nombre = $request->name;
        $contacto->apellido_paterno = $request->ape_paterno;
        $contacto->apellido_materno = $request->ape_materno;
        $contacto->numero = $request->telefono;

        // Guardar los cambios en la base de datos
        $contacto->save();

        // Redireccionar al usuario a la lista de contactos con un mensaje de éxito
        return redirect()->route('contactos.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contacto::findOrFail($id);
        $contact->delete();
 
        return redirect()->route('contactos.index');
    }
}
