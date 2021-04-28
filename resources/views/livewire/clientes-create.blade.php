
<div class="py-12">
    

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="p-1">
            <div>
                @if ($error) 
                <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 ">
                    <div slot="avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-5 h-5 mx-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="text-xl font-normal  max-w-full flex-initial">
                        {{$error}}</div>
                    <div class="flex flex-auto flex-row-reverse">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-5 h-5 ml-2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                @endif
                
            
                @if ($success)
                    <div class="mt-4"></div>
                    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                        <div slot="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mx-2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="text-xl font-normal  max-w-full flex-initial">
                            {{$success}}</div>
                        <div class="flex flex-auto flex-row-reverse">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>


        <div>
          <div class="md:grid md:grid-cols-1 md:gap-6">

            <div class="mt-5 md:mt-0 md:col-span-2">
                @if ($idUsuario > 0)
                    <form wire:submit.prevent='update' method="POST" enctype="multipart/form-data">
                @else
                    <form wire:submit.prevent='create' method="POST" enctype="multipart/form-data">
                @endif
                  @csrf
                  <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                      <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-1">
                          <label for="company_website" class="block text-sm font-medium text-gray-700">
                            Nome
                          </label>
                          <div class="mt-1 flex rounded-md shadow-sm">

                            <input type="text" wire:model="nome"
                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                              placeholder="Nome do Cliente" required>
                          </div>
                        </div>
                        <div class="col-span-3 sm:col-span-1">
                          <label for="company_website" class="block text-sm font-medium text-gray-700">
                            Cpf
                          </label>
                          <div class="mt-1 flex rounded-md shadow-sm">

                            <input type="text" wire:model="cpf"
                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                              placeholder="000.000.000-00" required>
                          </div>
                        </div>
                        <div class="col-span-3 sm:col-span-1">
                          <label for="company_website" class="block text-sm font-medium text-gray-700">
                            Telefone
                          </label>
                          <div class="mt-1 flex rounded-md shadow-sm">

                            <input type="tel" placeholder="(00) 00000-0000" wire:model="telefone"
                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                          </div>
                        </div>
                      </div>

                      <div>
                        <label for="about" class="block text-sm font-medium text-gray-700">
                          Endereço
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">

                            <input type="text" wire:model="endereco"
                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                              placeholder="Endereço" required>
                          </div>
                      </div>

                      <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block text-sm font-medium text-gray-700">Número</label>
                          <div class="mt-1 relative rounded-md shadow-sm">
                            
                            <input type="text" wire:model="numero"
                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                              placeholder="Número" required>
                          </div>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block text-sm font-medium text-gray-700">Complemento</label>
                          <div class="mt-1 relative rounded-md shadow-sm">
                            
                            <input type="text" wire:model="complemento"
                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                              placeholder="Complemento">
                          </div>
                        </div>
                      </div>

                      <div class="grid grid-cols-2 gap-6">
                        <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block text-sm font-medium text-gray-700">Cidade</label>
                          <div class="mt-1 relative rounded-md shadow-sm">
                            
                            <input type="text" wire:model="cidade"
                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                              placeholder="Cidade" required>
                          </div>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                          <label for="price" class="block text-sm font-medium text-gray-700">UF</label>
                          <div class="mt-1 relative rounded-md shadow-sm">
                            
                            <input type="text" wire:model="uf"
                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                              placeholder="UF">
                          </div>
                        </div>


                      </div>

                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                      <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Salvar
                      </button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>