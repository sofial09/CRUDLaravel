<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use PDF;

class ProyectoController extends Controller
{
    // ...    
    public function getPDF() {
        $projects = Proyecto::all(); // Obtener todos los proyectos
        $pdf = PDF::loadView('File_PDF', compact('projects'));
        return $pdf->stream('Proyectos.pdf');
    }

    public function index(): Renderable { 
        $projects = Proyecto::paginate(1);
        return view('projects.index', compact('projects'));
    }

    public function create(): Renderable
    {
        $project = new Proyecto;
        $title = __('Crear proyecto');
        $action = route('projects.store');
        $buttonText = __('Guardar');
        return view('projects.form', compact('project', 'title', 'action', 'buttonText'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'NombreProyecto' => 'required|unique:proyecto,NombreProyecto|string|max:50',
            'fuenteFondos' => 'required|unique:proyecto,fuenteFondos|string|max:10',
            'MontoPlanificado' => 'required|unique:proyecto,MontoPlanificado|string|max:10',
            'MontoPatrocinado' => 'required|unique:proyecto,MontoPatrocinado|string|max:10',
            'MontoFondosPropios' => 'required|unique:proyecto,MontoFondosPropios|string|max:10',
        ]);
        Proyecto::create([
            'NombreProyecto' => $request->string('NombreProyecto'),
            'fuenteFondos' => $request->string('fuenteFondos'),
            'MontoPlanificado' => $request->string('MontoPlanificado'),
            'MontoPatrocinado' => $request->string('MontoPatrocinado'),
            'MontoFondosPropios' => $request->string('MontoFondosPropios'),
        ]);
        return redirect()->route('projects.index');
    }

    public function show(Proyecto $project): Renderable
    {
        $project->load('user:id,name');
        return view('projects.show', compact('project'));
    }

    public function edit(Proyecto $project): Renderable
    {
        $title = __('Editar proyecto');
        $action = route('projects.update', $project);
        $buttonText = __('Actualizar proyecto');
        $method = 'PUT';
        return view('projects.form', compact('project', 'title', 'action', 'buttonText', 'method'));
    }

    public function update(Request $request, Proyecto $project): RedirectResponse
    {
        $request->validate([
            'NombreProyecto' => 'required|unique:proyecto,NombreProyecto,'.$project->id.'|string|max:50',
            'fuenteFondos' => 'required|unique:proyecto,fuenteFondos,'.$project->id.'|string|max:10',
            'MontoPlanificado' => 'required|unique:proyecto,MontoPlanificado,'.$project->id.'|string|max:10',
            'MontoPatrocinado' => 'required|unique:proyecto,MontoPatrocinado,'.$project->id.'|string|max:10',
            'MontoFondosPropios' => 'required|unique:proyecto,MontoFondosPropios,'.$project->id.'|string|max:10',
        ]);
    
        $project->update([
            'NombreProyecto' => $request->input('NombreProyecto'),
            'fuenteFondos' => $request->input('fuenteFondos'),
            'MontoPlanificado' => $request->input('MontoPlanificado'),
            'MontoPatrocinado' => $request->input('MontoPatrocinado'),
            'MontoFondosPropios' => $request->input('MontoFondosPropios'),
        ]);
    
        return redirect()->route('projects.index');
    }
    

    public function destroy(Proyecto $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}