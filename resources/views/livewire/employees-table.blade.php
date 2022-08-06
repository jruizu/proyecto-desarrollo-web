<div>
    <div>
    <div class="flex">
					<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
					wire:model="search" placeholder="Buscar"/>
                    <div  class="fornm-input rounded-md shadow-sm ml-6 block">
                        <select wire:model="perPage" class="outline-none text-gray-500 text-sm">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </div>
				</div>
                @if ($employees->count())
                    
        <table class="w-full text-md rounded mb-4">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Cédula</th>
                    <th class="text-left p-3 px-5">Nombre</th>
                    <th class="text-left p-3 px-5">Apellidos</th>
                    <th class="text-left p-3 px-5">Empresa</th>
                    <th class="text-left p-3 px-5">Cargo</th>
                    <th class="text-left p-3 px-5">Salario</th>
                    <th class="text-left p-3 px-5">Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5">
                        {{$employee->cedula}}
                    </td>
                    <td class="p-3 px-5">
                        {{$employee->nombre}}
                    </td>
                    <td class="p-3 px-5">
                     {{$employee->primer_apellido}}  {{$employee->segundo_apellido}}
                    </td>
                   
                  
                    <td class="p-3 px-5">
                        {{$employee->company->razon_social}} -  {{$employee->company->nit}}
                    </td>
                    <td class="p-3 px-5">
                        {{data_get($employee, 'currentContract.job.nombre', "")}}
                    </td>
                    <td class="p-3 px-5">
                        {{data_get($employee, 'currentContract.salario', "")}}
                    </td>
                    <td class="p-3 px-5">

                        <a href="/employees/edit/{{$employee->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</a>
                        <form action="/employees/delete/{{$employee->id}}" class="inline-block">
                            <button type="submit" name="delete" formmethod="POST" class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Desvincular</button>
                            {{ csrf_field() }}
                        </form>
                    </td>
                </tr>


                @endforeach
            </tbody>
        </table>
        {{ $employees->render(); }}
        @else
         <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6"> No hay resultado</div>
        @endif

    </div>
</div>