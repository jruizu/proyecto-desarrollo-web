<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Servicios Temporales') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
				<div class="flex">
					<div class="flex-auto text-2xl mb-4">Empresas asociadas</div>

					<div class="flex-auto text-right mt-2">
						<a href="/companies/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar cempresa</a>
					</div>

				</div>
		
				<livewire:companies-table></livewire:companies-table>
			</div>
		</div>
	</div>
</x-app-layout>