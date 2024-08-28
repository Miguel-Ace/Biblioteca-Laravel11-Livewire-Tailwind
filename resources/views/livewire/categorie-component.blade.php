<div>
    <h2 class="text-[2em] transition-all duration-[.3s] hover:tracking-[.1em]">Tabla de categorias</h2>
    
    <x-button wire:click='open_modal' class="bg-cyan-800 transition-all duration-[.3s] hover:px-2"> Nuevo </x-button>

    <table class="rounded-[3px] w-full shadow shadow-white shadow-2xl">
        <thead class="bg-cyan-800">
            <tr>
                <td class="border text-center font-bold p-2">Nombre</td>
                <td class="border text-center font-bold p-2">-</td>
            </tr>
        </thead>
        <tbody>
            @if ($categories->count() > 0)
                @foreach ($categories as $categorie)
                    <tr>
                        <td class="border text-center p-2">{{$categorie->nombre}}</td>
                        <td class="border text-center p-2 flex justify-center gap-2">
                            <button wire:click='open_modal_editar({{$categorie}})' class="bg-blue-700 px-1 border rounded hover:bg-blue-800 transition-all">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            {{-- <button wire:click='' class="bg-purple-700 px-1 mx-1 border rounded hover:bg-purple-800 transition-all">
                                <i class="fa-solid fa-share"></i>
                            </button> --}}
                            <button wire:click='delete_categorie({{$categorie->id}})' wire:confirm='¿Seguro de borrarlo?' class="bg-red-600 px-1 border rounded hover:bg-red-800 transition-all">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="3">
                        <p class="text-2xl py-4">No se encontraron elementos</p>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    @if ($modal)
        <x-modal-form>
            @if ($isOpenModaCreate)
                <h2 class="text-center text-2xl">Crear categoria</h2>
            @else
                <h2 class="text-center text-2xl">Editar categoria</h2>
            @endif

            <div class="flex flex-col gap-1 mb-3">
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-text-input wire:model="nombre" id="nombre" class="block mt-1 w-full" type="text" name="nombre" autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <div class="my-3 flex gap-1">
                @if ($isOpenModaCreate)  
                    <x-save-button wire:click.prevent='create_categorie'>Guardar</x-save-button>
                @else
                    <x-save-button wire:click.prevent='update_categorie'>Actualizar</x-save-button>
                @endif
                <x-cancelar-button wire:click.prevent='close_modal'>Cancelar</x-save-button>
            </div>
        </x-modal-form>
    @endif
</div>