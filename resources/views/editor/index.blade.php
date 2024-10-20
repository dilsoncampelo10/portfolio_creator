<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grapes JS Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    @vite(['resources/css/main.css','resources/css/grape/grape.css','resources/js/grape/content-grape.js','resources/js/app.js','resources/js/grape/custom-blocks.js'])

    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://unpkg.com/grapesjs-blocks-basic"></script>
  </head>
  <body>
  
    <div id="navbar" class="sidenav d-flex flex-column overflow-scroll"> 
    
        <div class="my-2 d-flex flex-column">
          <button type="button" class="btn btn-outline-secondary btn-sm mx-2">
            <i class="fa-solid fa-file-circle-plus"></i> Add Página
          </button>
          <ul class="list-group topics">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Página 1
                <div class="m-2">
                    
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Página 2
              <div class="m-2">
                  <button class="btn btn-sm btn-outline-primary">
                      <i class="fa-solid fa-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger">
                      <i class="fa-solid fa-trash"></i>
                  </button>
              </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Página 3
                <div class="m-2">
                  <button class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pencil"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger">
                  <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </li>
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
                        <a href="{{route('dashboard')}}">
                          <i class="fa-solid fa-not-equal"></i>
                          <img src="" alt="logo" class="w-100"></a>
                    </span>
                </div>
              </header>
              <div class="panel__basic-actions"></div>
                <div class="panel__devices"></div>
           
            </div>
        </nav>
        <div id="editor">

          <link rel="stylesheet" href="{{asset('assets/blocks/custom_blocks.css')}}">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        </div>
    </div>


 
  
  </body>
</html>