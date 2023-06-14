<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-black text-xl leading-tight">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between" >
                        <h1 class="text-2xl font-bold">{{ __('Proyectos') }}</h1>
                        <a style="background-color: rgb(134 239 172);" href="{{ route('projects.create') }}" class="text-black font-bold py-2 px-4 rounded">Agregar Proyecto</a>
                    </div>
                
                    <div class="mt-4">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">{{ __('Proyecto') }}</th>
                                    <th class="px-4 py-2">{{ __('Fuente Fondos') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Planificado') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Patrocinado') }}</th>
                                    <th class="px-4 py-2">{{ __('Monto Fondos Propios') }}</th>
                                    <th class="px-4 py-2">{{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($projects as $project)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $project->NombreProyecto }}</td>
                                        <td class="border px-4 py-2">{{ $project->fuenteFondos }}</td>
                                        <td class="border px-4 py-2">{{ $project->MontoPlanificado }}</td>
                                        <td class="border px-4 py-2">{{ $project->MontoPatrocinado }}</td>
                                        <td class="border px-4 py-2">{{ $project->MontoFondosPropios }}</td>
                                        <td class="border px-4 py-2" style="width: 260px">
                                            <a style="background-color: rgb(147 197 253);" href="{{ route('projects.show', $project) }}" class="text-black font-bold py-2 px-4 rounded">{{ __('Ver') }}</a>
                                            <a style="background-color: rgb(165 243 252);" href="{{ route('projects.edit', $project) }}" class="text-black font-bold py-2 px-4 rounded">{{ __('Editar') }}</a>
                                            <a style="background-color: rgb(165 243 252);" href="{{ route('proyecto.pdf', $project) }}" class="text-black font-bold py-2 px-4 rounded">{{ __('PDF') }}</a>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background-color: rgb(252 165 165);" type="submit" class="text-black font-bold py-2 px-4 rounded">{{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-red-400 text-white text-center">
                                        <td colspan="3" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($projects->hasPages())
                                <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <td colspan="3" class="border px-4 py-2">
                                            {{ $projects->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>