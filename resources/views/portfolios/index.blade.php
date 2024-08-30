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
                   
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">Portifólios</h1>
                    <div>

                    <div class="flex items-center">
                        <span class="absolute ms-5"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="w-full my-10 rounded-full ps-11" placeholder="Pesquisar">
                    </div>
                    <div class="text-right mb-10"><a href="{{route('portfolio.create')}}" class="bg-blue-500 text-white py-2 px-3 hover:bg-blue-700 rounded-lg">Criar Portifólio</a></div>
                    @if ($portfolios->isNotEmpty())
                    <table class=" w-full">
                     
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                                <tr class="border-b-2 border-gray-200 border-spacing-2">
                                    <td><a href="{{route('editor.portfolio',['token'=>$portfolio->token])}}">{{$portfolio->title}}</a></td>
                                    <td>{{$portfolio->description}}</td>
                                    <td class="flex gap-2">
                                        <a href="{{route('portfolio.edit',['id'=>$portfolio->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{route('portfolio.destroy',['id'=>$portfolio->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                          
                         
                        </tbody>
                      </table>
                      @else
                      <p>O usuário não criou nenhum portifólio</p>
                    @endif
                       
                    </div>
              
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
