const editor = grapesjs.init({
    container: "#editor",
    fromElement: true,
    width: "auto",
    storageManager: false,
    plugins: ["gjs-blocks-basic","grapesjs-style-bg"],
    pluginsOpts: {
      "gjs-blocks-basic": {},
      "grapesjs-style-bg":{}
    },
    blockManager: {
      appendTo: "#blocks",
    },
    layerManager: {
      appendTo: "#layer-container",
    },
    traitManager: {
      appendTo: "#trait-container"
    },
    selectorManager: {
      appendTo: "#style-container",
    },
    styleManager: {
      appendTo: "#style-container",
      sectors: [
        {
          name: "Dimensão",
          open: false,
          buildProps: ["width","min-height","padding","background-color","color"],
          properties: [{
            type: "integer",
            name: "Largura",
            property: "width",
            units: ["pix","%","rem"],
            defaults: "auto",
            min: 0
          }]
        },
        {
          name: "Decoração",
          open: false,
          buildProps: ["background","opacity"],
          properties: [{
        
          }]
        }
      ]
    },
    panels: {
      defaults: [
        {
          id: "basic-actions",
          el: ".panel__basic-actions",
          buttons: [
            {
              id: "visibility",
              active: false,
              className: "btn-toggle-borders",
              label: "<i class='fa-solid fa-border-all'></i>",
              command: "sw-visibility"
            },
            {
              id: 'export',
              className: 'btn-open-export',
              label: '<i class="fa-solid fa-code"></i>',
              command: 'export-template',
              context: 'export-template',
            },
            
          ]
        },
        {
          id: "panel-devices",
          el: ".panel__devices",
          buttons: [
            {
              id:"device-desktop",
              label: "<i class='fa-solid fa-desktop'></i>",
              command: "set-device-desktop",
              active: true,
              togglable: false
            },
            {
              id:"device-tablet",
              label: "<i class='fa-solid fa-tablet'></i>",
              command: "set-device-tablet",
             
            },
            {
              id:"device-mobile",
              label: "<i class='fa-solid fa-mobile'></i>",
              command: "set-device-mobile",
          
            },
       
          ]
        }
      ]
    },
    deviceManager: {
      devices: [
        {
        name: "Desktop",
        width: ""
      },
      ,
      {
        name: "Tablet",
        width: "680px",
        widthMedia: "720px"
      },
      {
        name: "Mobile",
        width: "320px",
        widthMedia: "480px"
      }
    ]
    }
  });

  window.editor = editor

  // editor.BlockManager.add('video', {
  //   label: 'Video',
  //   content: '<div class="video" data-video-id=""><video src="" controls></video></div>',
  // });
  
  // editor.on('component:selected', model => {
  //   if (model.get('tagName') === 'video') {
  //     const videoUrl = prompt('Enter video URL');
  //     if (videoUrl) {
  //       console.log(model.attributes.src = 'eae')
  //       model.attributes.src = videoUrl;
  //       console.log(model.attributes.src)
  //     }
  //   }
  // });

  editor.Commands.add("set-device-desktop", {
    run: (editor,sender) => editor.setDevice("Desktop"),
  });

  editor.Commands.add("set-device-tablet", {
    run: (editor,sender) => editor.setDevice("Tablet"),
  });

  editor.Commands.add("set-device-mobile", {
    run: (editor,sender) => editor.setDevice("Mobile"),
  });



  var blockManager = editor.BlockManager;

  
  const cloneAndTranslateBlock = (blockId, newId, newLabel, newCategory,media = 'default') => {
  
    const originalBlock = blockManager.get(blockId);
    console.log(originalBlock)
    if (originalBlock) {
      // Clona o bloco existente
      blockManager.add(newId, {
        ...originalBlock.attributes, // Mantém todas as configurações do bloco original
        id: newId,
        label: newLabel,
        category: newCategory || originalBlock.get('category'),
        media :media
      });
  
      // Remove o bloco original, se desejar
      blockManager.remove(blockId);
    }
  };
  function removeBlocks() {
    const blockIds = ['column1', 'column2', 'column3','column3-7','map'];
    blockIds.forEach(id => {
      editor.BlockManager.remove(id);
    });
  }
  cloneAndTranslateBlock('text', 'texto', 'Texto', 'Padrão','<img src=/assets/img/icons/editor/text.svg>');
  cloneAndTranslateBlock('link', 'linkn', 'Link', 'Navegação',`<img src=/assets/img/icons/editor/link.svg>`);
  cloneAndTranslateBlock('image', 'imagem', 'Imagem', 'Padrão',`<img src=/assets/img/icons/editor/image.svg>`);
  cloneAndTranslateBlock('video', 'videon', 'Vídeo', 'Padrão',`<img src=/assets/img/icons/editor/video.svg>`);
removeBlocks()
document.querySelector('.gjs-block-category').style.display = 'none';


function addBottomSpace(editor) {
  const wrapper = editor.getWrapper(); 
  const wrapperEl = wrapper.view.el; 
  const existingSpace = wrapperEl.querySelector('.extra-space');

  if (!existingSpace) {
    const spacer = document.createElement('div');
    spacer.className = 'extra-space';
    spacer.style.height = '200px'; 
    // spacer.style.border = '2px dashed #ccc'; 
    spacer.style.position = 'relative';
    spacer.style.zIndex = '1'; 

 
    spacer.ondrop = (event) => {
      event.preventDefault();
      const data = event.dataTransfer.getData('text/plain');
      editor.addComponents(data); 
    };

    spacer.ondragover = (event) => {
      event.preventDefault();
      spacer.style.backgroundColor = '#fff'; 
    };

    spacer.ondragleave = () => {
      spacer.style.backgroundColor = ''; 
    };

 
    wrapperEl.appendChild(spacer);
  }
}

editor.on('load', () => {
  addBottomSpace(editor);
});


editor.on('component:add component:update', () => {
  addBottomSpace(editor);
});
