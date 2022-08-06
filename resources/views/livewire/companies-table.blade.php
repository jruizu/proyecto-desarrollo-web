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
                @if ($companies->count())
                    
        <table class="w-full text-md rounded mb-4">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Razón Social</th>
                    <th class="text-left p-3 px-5">Nit</th>
                    <th class="text-left p-3 px-5">No Empleados</th>
                    <th class="text-left p-3 px-5">Comision</th>
                    <th class="text-left p-3 px-5">Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr class="border-b hover:bg-orange-100">
                    <td class="p-3 px-5">
                        {{$company->razon_social}}
                    </td>
                    <td class="p-3 px-5">
                        {{$company->nit}}
                    </td>
                    <td class="p-3 px-5">
                        {{$company->employees_count}}
                    </td>
                    <td class="p-3 px-5">
                        {{$company->comision}}%
                    </td>
                    <td class="p-3 px-5">

                        <a href="/companies/edit/{{$company->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Editar</a>
                        <form action="/companies/delete/{{$company->id}}" class="inline-block">
                            <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Desvincular</button>
                            {{ csrf_field() }}
                        </form>
                    </td>
                </tr>


                @endforeach
            </tbody>
        </table>
        {{ $companies->render(); }}
        @else
         <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6"> No hay resultado</div>
        @endif

    </div>
</div>