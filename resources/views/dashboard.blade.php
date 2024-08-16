<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>{{ __("You're logged in!") }}</div>
                    <div class="flex flex-row gap-5">
                            <a href="{{route('portifolio.create')}}" class="flex-1">
                                <div class=" bg-green-400 text-center text-xl p-5 text-white">
                                    <i class="fa-solid fa-circle-plus text-[60px] mb-5"></i>
                                    <div>Criar Portifólio</div>
                                </div>
                            </a>
                            <a href="" class="flex-1">
                                <div class="bg-indigo-400 text-center text-xl p-5 text-white">
                                    <i class="fa-solid fa-list text-[60px] mb-5"></i>
                                    <div>Lista de Portifólios</div>
                                </div>
                            </a>
                            <a href="" class="flex-1">
                                <div class=" bg-red-400 text-center text-xl p-5 text-white">
                                    <i class="fa-solid fa-magnifying-glass text-[60px] mb-5"></i>
                                    <p>Buscar Portifólios</p>
                                </div>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
