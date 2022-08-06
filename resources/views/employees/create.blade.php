<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Vincular empleado') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
				<form method="POST" action="/employees/{{!isset($employee) ?  'store' : 'update/'. $employee->id}}">
					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="cedula">
								Cédula
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="cedula" id="cedula" type="text" value="{{isset($employee) ? $employee->cedula : ''}}">
							@if ($errors->has('cedula'))
							<span class="text-danger">{{ $errors->first('cedula') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombres
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="nombre" id="nombre" type="text" value="{{isset($employee) ? $employee->nombre : ''}}">

							@if ($errors->has('nombre'))
							<span class="text-danger">{{ $errors->first('nombre') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="primer_apellido">
								Primer apellido
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="primer_apellido" id="primer_apellido" type="text" value="{{isset($employee) ? $employee->primer_apellido : ''}}">
							@if ($errors->has('primer_apellido'))
							<span class="text-danger">{{ $errors->first('primer_apellido') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="segundo_apellido">
								Segundo apellido
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="segundo_apellido" id="segundo_apellido" type="text" value="{{isset($employee) ? $employee->segundo_apellido : ''}}">
							@if ($errors->has('segundo_apellido'))
							<span class="text-danger">{{ $errors->first('segundo_apellido') }}</span>
							@endif
						</div>
					</div>
					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
								Teléfono
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="telefono" id="telefono" type="text" value="{{isset($employee) ? $employee->telefono : ''}}">
							@if ($errors->has('telefono'))
							<span class="text-danger">{{ $errors->first('telefono') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="email">Correo electrónico
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="example@mail.com" value="{{isset($employee) ? $employee->email : ''}}">
							@if ($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
							@endif
						</div>

						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="direccion">
								Dirección
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="direccion" id="direccion" type="text" value="{{isset($employee) ? $employee->direccion : ''}}">
							@if ($errors->has('direccion'))
							<span class="text-danger">{{ $errors->first('direccion') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_nacimiento">
								Fecha de nacimiento
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="fecha_nacimiento" id="fecha_nacimiento" type="date" value="{{isset($employee) ? $employee->fecha_nacimiento : ''}}">
							@if ($errors->has('fecha_nacimiento'))
							<span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
							@endif
						</div>
					</div>
					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="company_id">
								Empresa a la cual va a vincular
							</label>
							<select name="company_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
							@if(isset($companyOwner)) disabled @endif >
							<option value="">Seleccione una empresa</option>
							 @foreach ($companies as $company)
							  <option @if(isset($employee)) && $employee->company_id === $company->id) selected @endif value="{{$company->id}}">{{$company->razon_social}} - {{$company->nit}}</option>
							 @endforeach
							</select>
							@if ($errors->has('company_id'))
							<span class="text-danger">{{ $errors->first('company_id') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="company_id">
								Cargo
							</label>
							<select name="job_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
							@if(isset($companyOwner)) disabled @endif >
							<option value="">Seleccione un cargo</option>
							 @foreach ($jobs as $job)
							  <option @if(isset($contract) && $contract->employee_jobs_id === $job->id) selected @endif value="{{$job->id}}">{{$job->nombre}}</option>
							 @endforeach
							</select>
							@if ($errors->has('job_id'))
							<span class="text-danger">{{ $errors->first('job_id') }}</span>
							@endif
						</div>
						<div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="salario">
								Salario a devengar
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="salario" id="salario" type="text" value="{{isset($contract) ? $contract->salario : ''}}">
							@if ($errors->has('salario'))
							<span class="text-danger">{{ $errors->first('salario') }}</span>
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