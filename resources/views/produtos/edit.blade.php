<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div>
            <div class="md:grid md:grid-cols-1 md:gap-6">
                
                <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('edit-produto', ['id' => $produto->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-1">
                                <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Nome
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                
                                <input type="text" name="nome" value="{{$produto->nome}}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Nome do Produto" required>
                                </div>
                            </div>
                            <div class="col-span-3 sm:col-span-1">
                                <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Quantidade
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                
                                <input type="number" name="quantidade" value="{{$produto->quantidade}}"  class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" required>
                                </div>
                            </div>
                            <div class="col-span-3 sm:col-span-1">
                                <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Código
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                
                                <input type="text" name="codigo" value="{{$produto->codigo}}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block text-sm font-medium text-gray-700">Custo</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">
                                        $
                                    </span>
                                    </div>
                                    <input type="text" name="custo" id="price" value="{{$produto->custo}}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0,00" required>
                                    
                                </div>
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="block text-sm font-medium text-gray-700">Preço</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">
                                        $
                                    </span>
                                    </div>
                                    <input type="text" name="preco" value="{{$produto->preco}}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0,00" required>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div>
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Descrição
                            </label>
                            <div class="mt-1">
                                <textarea name="descricao" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Descrição do produto" required>{{$produto->descricao}}</textarea>
                            </div>
                        
                        </div>


                        <div>
                        <label for="about" class="block text-sm font-medium text-gray-700">
                                Imagem
                            </label>
                            <!-- scroll area -->
                            <section class="">
                            
                                <header class="border-dashed border-2 border-gray-300 py-12 flex flex-col justify-center items-center rounded-md">
                                
                                <input type="file" id="hidden-input" name="imagem_produto" class="hidden" />
                                <a id="button" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                    Buscar
                                </a>
                                </header>

                                <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                Imagens selecionadas
                                </h1>

                                <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                    <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                                    <span class="text-small text-gray-500">Sem imagens selecionadas</span>
                                </li>
                                </ul>
                            </section>

                             <!-- using two similar templates for simplicity in js code -->
                            <template id="file-template">
                              <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                                  <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                                  <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                    <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                    <div class="flex">
                                      <span class="p-1 text-blue-800">
                                        <i>
                                          <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                          </svg>
                                        </i>
                                      </span>
                                      <p class="p-1 size text-xs text-gray-700"></p>
                                      <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                          <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </section>
                                </article>
                              </li>
                            </template>

                            <template id="image-template">
                              <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                                <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                  <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                                  <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                    <h1 class="flex-1"></h1>
                                    <div class="flex">
                                      <span class="p-1">
                                        <i>
                                          <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                          </svg>
                                        </i>
                                      </span>

                                      <p class="p-1 size text-xs"></p>
                                      <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                        <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                          <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                        </svg>
                                      </button>
                                    </div>
                                  </section>
                                </article>
                              </li>
                            </template>




                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
</x-app-layout>
<script>
const fileTempl = document.getElementById("file-template"),
  imageTempl = document.getElementById("image-template"),
  empty = document.getElementById("empty");

// use to store pre selected files
let FILES = {};

// check if file is of type image and prepend the initialied
// template to the target element
function addFile(target, file) {
  const isImage = file.type.match("image.*"),
    objectURL = URL.createObjectURL(file);

  const clone = isImage
    ? imageTempl.content.cloneNode(true)
    : fileTempl.content.cloneNode(true);

  clone.querySelector("h1").textContent = file.name;
  clone.querySelector("li").id = objectURL;
  clone.querySelector(".delete").dataset.target = objectURL;
  clone.querySelector(".size").textContent =
    file.size > 1024
      ? file.size > 1048576
        ? Math.round(file.size / 1048576) + "mb"
        : Math.round(file.size / 1024) + "kb"
      : file.size + "b";

  isImage &&
    Object.assign(clone.querySelector("img"), {
      src: objectURL,
      alt: file.name
    });

  empty.classList.add("hidden");
  target.prepend(clone);

  FILES[objectURL] = file;
}

const gallery = document.getElementById("gallery"),
  overlay = document.getElementById("overlay");

// click the hidden input of type file if the visible button is clicked
// and capture the selected files
const hidden = document.getElementById("hidden-input");
document.getElementById("button").onclick = () => hidden.click();
hidden.onchange = (e) => {
  for (const file of e.target.files) {
    addFile(gallery, file);
  }
};

// use to check if a file is being dragged
const hasFiles = ({ dataTransfer: { types = [] } }) =>
  types.indexOf("Files") > -1;

// use to drag dragenter and dragleave events.
// this is to know if the outermost parent is dragged over
// without issues due to drag events on its children
let counter = 0;

// reset counter and append file to gallery when file is dropped
function dropHandler(ev) {
  ev.preventDefault();
  for (const file of ev.dataTransfer.files) {
    addFile(gallery, file);
    overlay.classList.remove("draggedover");
    counter = 0;
  }
}

// only react to actual files being dragged
function dragEnterHandler(e) {
  e.preventDefault();
  if (!hasFiles(e)) {
    return;
  }
  ++counter && overlay.classList.add("draggedover");
}

function dragLeaveHandler(e) {
  1 > --counter && overlay.classList.remove("draggedover");
}

function dragOverHandler(e) {
  if (hasFiles(e)) {
    e.preventDefault();
  }
}

// event delegation to caputre delete events
// fron the waste buckets in the file preview cards
gallery.onclick = ({ target }) => {
  if (target.classList.contains("delete")) {
    const ou = target.dataset.target;
    document.getElementById(ou).remove(ou);
    gallery.children.length === 1 && empty.classList.remove("hidden");
    delete FILES[ou];
  }
};

// print all selected files
document.getElementById("submit").onclick = () => {
  alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
  console.log(FILES);
};

// clear entire selection
document.getElementById("cancel").onclick = () => {
  while (gallery.children.length > 0) {
    gallery.lastChild.remove();
  }
  FILES = {};
  empty.classList.remove("hidden");
  gallery.append(empty);
};

</script>

<style>
.hasImage:hover section {
  background-color: rgba(5, 5, 5, 0.4);
}
.hasImage:hover button:hover {
  background: rgba(5, 5, 5, 0.45);
}

#overlay p,
i {
  opacity: 0;
}

#overlay.draggedover {
  background-color: rgba(255, 255, 255, 0.7);
}
#overlay.draggedover p,
#overlay.draggedover i {
  opacity: 1;
}

.group:hover .group-hover\:text-blue-800 {
  color: #2b6cb0;
}
</style>