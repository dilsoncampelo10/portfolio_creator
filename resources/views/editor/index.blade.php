<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grapes JS Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    @vite(['resources/css/main.css','resources/css/grape/grape.css','resources/js/grape/content-grape.js','resources/js/app.js','resources/js/grape/custom-blocks.js','resources/js/grape/editor/index.js'])

    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://unpkg.com/grapesjs-blocks-basic"></script>
    <script src="https://unpkg.com/grapesjs-style-bg"></script>
  </head>
  <body>
  
    <div id="navbar" class="sidenav d-flex flex-column overflow-scroll"> 
    
        <div class="my-2 d-flex flex-column">
          <button type="button" class="btn btn-outline-light btn-sm mx-2 my-3" data-bs-toggle="modal" data-bs-target="#addPageModal">
            <i class="fa-solid fa-file-circle-plus"></i> Add Página
          </button>
          <ul class="list-group topics">
            @foreach ($pages as $page)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="btn text-light" href="{{route('editor.portfolio',['token'=>$portfolio->token,'page'=>$page->id])}}">{{$page->title}}</a>
                <div class="m-2">
                    
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </li>
            @endforeach
        
          </ul>
        </div>
        <div>
            <ul class="nav nav-tabs justify-content-between" role="tablist">
              <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="block-tab" data-bs-toggle="tab" data-bs-target="#block" aria-selected="true" aria-controls="block">

                      <i class="fa-solid fa-puzzle-piece"></i>
                  </button>
              </li>


              <li class="nav-item" role="presentation">
                  <button class="nav-link " id="layer-tab" data-bs-toggle="tab" data-bs-target="#layer" aria-selected="true" aria-controls="layer">

                    <i class="fa-solid fa-layer-group"></i>
                  </button>
              </li>

              <li class="nav-item" role="presentation">
                  <button class="nav-link " id="style-tab" data-bs-toggle="tab" data-bs-target="#style" aria-selected="true" aria-controls="style">

                    <i class="fa-solid fa-palette"></i>
                  </button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link " id="trait-tab" data-bs-toggle="tab" data-bs-target="#trait" aria-selected="true" aria-controls="trait">

                  <i class="fa-solid fa-gear"></i>
                </button>
            </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="block" role="tabpanel" aria-labelledby="block-tab">
                  <div id="blocks"></div>
                </div>

                <div class="tab-pane fade show " id="layer" role="tabpanel" aria-labelledby="layer-tab">
                  <div id="layer-container"></div>
                </div>

                <div class="tab-pane fade show " id="style" role="tabpanel" aria-labelledby="style-tab">
                  <div id="style-container"></div>
                </div>

                <div class="tab-pane fade show " id="trait" role="tabpanel" aria-labelledby="trait-tab">
                  <div id="trait-container"></div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="main-content">
        <nav class="navbar-light">
            <div class="container-fluid d-flex justify-content-between">
              <header class="navbar navbar-light">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h3 logo">
                        <a href="{{route('dashboard')}}" class="text-decoration-none">
                          <i class="fa-solid fa-not-equal"></i>
                          DILSON
                        </a>
                    </span>
                </div>
              </header>
              <div>
             
             
                <button class="mt-2 btn btn-sm btn-outline-success save-button" data-page="{{$currentPage->id}}" data-portfolio="{{ $portfolio->id}}">   
              
                  <i class="fa-regular fa-floppy-disk save-icon"></i>
          
                  <span class="spinner-grow spinner-grow-sm loading-icon d-none" aria-hidden="true"></span>
                   Salvar
                
                </button>
                <a target="_blank" class="mt-2 btn btn-sm btn-outline-primary ms-3" href="{{route('portfolio.preview',['token'=>$portfolio->token,'url'=>$currentPage->url])}}"><i class="fa-solid fa-eye"></i> Visualizar Resultado</a>

                <a href="{{route('portfolios')}}" class="btn btn-sm btn-outline-warning mt-2"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
              </div>
              <div class="panel__basic-actions"></div>
              
                <div class="panel__devices"></div>
           
            </div>
        </nav>
        <div id="editor">
          <style>
            {!!$currentPage->css!!}
          </style>
          {!!$currentPage->html!!}
          <link rel="stylesheet" href="{{asset('assets/blocks/custom_blocks.css')}}">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        </div>
    </div>


    @include('components.modal.page.create')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>