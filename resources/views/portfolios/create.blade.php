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
                   
                    <h1 class="font-semibold text-xl mb-10 text-gray-800 dark:text-gray-200 leading-tight text-center">Criar Portifólio</h1>
                    <div class="text-right mb-10"><a href="{{route('portfolios')}}" class="bg-blue-500 text-white py-2 px-3 hover:bg-blue-700 rounded-lg">Listar Portifólio</a></div>
                    <div>
                        <form action="{{route('portfolio.store')}}" method="POST">
                            @csrf
                            <input type="text" name="title" placeholder="Título para portifólio" class="w-full rounded-lg mb-5">
                            <textarea name="description" id="description" class="w-full rounded-lg" placeholder="Descrição para Portifólio"></textarea>
                            <div class="text-right">
                                <button type="submit" class=" bg-green-500 text-white py-1 px-3 hover:bg-green-700 rounded-lg btn">Salvar</button>
                                <button type="reset" class=" bg-gray-500 text-white py-1 px-3 hover:bg-gray-700 rounded-lg btn">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
