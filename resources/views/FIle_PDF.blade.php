<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title>
  </head>
  <body>
    <h1 class="title">GOBIERNO DE EL SALVADOR</h1>
    <h4>ALCALDÍA MUNICIPAL DE SANTA TECLA</h4>
    <h5>Martes 13 de Junio, 2023</h5>

    <div class="mt-4">
        <table id="customers">
          <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
              <th class="px-4 py-2">{{ __('Proyecto') }}</th>
              <th class="px-4 py-2">{{ __('Fuente Fondos') }}</th>
              <th class="px-4 py-2">{{ __('Monto Planificado') }}</th>
              <th class="px-4 py-2">{{ __('Monto Patrocinado') }}</th>
              <th class="px-4 py-2">{{ __('Fondos Propios') }}</th>
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
            </tr>
          @empty
            <tr class="bg-red-400 text-white text-center">
              <td colspan="3" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
            </tr>
          @endforelse
        </tbody>
        </table>
    </div>
  </body>
  <style>
      #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }

      #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
      }

      #customers tr:nth-child(even){
        background-color: #f2f2f2;
      }

      #customers tr:hover {
        background-color: #ddd;
      }

      #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #13274a;
      color: white;
      }

      .title{
      text-align: center
      }
    </style>
</html>  