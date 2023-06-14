<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nombre Proyecto') }}</label>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $project->NombreProyecto }}" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="fuente" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Fuente Fondos') }}</label>
                        <input type="text" name="fuente" id="fuente" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $project->fuenteFondos }}" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="monto" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Planificado') }}</label>
                        <input type="text" name="monto" id="monto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $project->MontoPlanificado }}" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="ptdo" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Patrocinado') }}</label>
                        <input type="text" name="ptdo" id="ptdo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $project->MontoPatrocinado }}" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="fondos" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Fondos Propios') }}</label>
                        <input type="text" name="fondos" id="fondos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $project->MontoFondosPropios }}" readonly>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('projects.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('Volver') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
