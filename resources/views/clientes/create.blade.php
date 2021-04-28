<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Adicionar Cliente') }}
    </h2>
  </x-slot>
    @livewire('clientes-create', ['clienteId' => null])
</x-app-layout>
