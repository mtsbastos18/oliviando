<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Editar Cliente') }}
    </h2>
  </x-slot>
    
    @livewire('clientes-create', ['clienteId' => $id])
</x-app-layout>
