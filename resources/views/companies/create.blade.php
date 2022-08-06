<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Crear empresa') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
				<form method="POST" action="/companies/{{!isset($company) ?  'store' : 'update/'. $company->id}}">
					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="razon_social">Razón Social
							</label>
							<input 
							class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
							name="razon_social" 
							id="razon_social" 
							type="text" 
							placeholder="Razón social" 
							value="{{isset($company) ? $company->razon_social : ''}}">
					
							@if ($errors->has('razon_social'))
							<span class="text-danger">{{ $errors->first('razon_social') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="nit">
								Nit
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
							name="nit"
							id="nit"
							type="text"
							value="{{isset($company) ? $company->nit : ''}}"
							>
							@if ($errors->has('nit'))
							<span class="text-danger">{{ $errors->first('nit') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="comision">
								Comisión
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
							name="comision"
							id="comision"
							type="text"
							value="{{isset($company) ? $company->comision : ''}}"
							>
							@if ($errors->has('comision'))
							<span class="text-danger">{{ $errors->first('comision') }}</span>
							@endif
						</div>
					</div>
			</div>


			<div class="form-group mt-5 ">
				<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
			</div>
			{{ csrf_field() }}
			</form>
		</div>
	</div>
	</div>


</x-app-layout>