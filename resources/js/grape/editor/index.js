document.querySelectorAll('.save-button').forEach(btn => {
    btn.addEventListener('click', function() {
        const saveButton = this;
        const saveIcon = saveButton.querySelector('.save-icon');
        const loadingIcon = saveButton.querySelector('.loading-icon');
        
        // Troca para ícone de carregamento
      
        loadingIcon.classList.remove('d-none');
        saveIcon.style.display = 'none';
    
        const html = editor.getHtml();
        const css = editor.getCss();
        
    
        const data = { 
            portfolio: saveButton.dataset.portfolio,
            html: html, 
            css: css,
        
            _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };
        
        let page = saveButton.dataset.page;
    
        fetch(`/save/${page}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            console.log(response)
            if (!response.ok) {
                return response.json().then(errorData => {
                    throw new Error(errorData.error || 'Erro ao salvar Tópico');
                });
            }
            return response.json();
        })
        .then(data => {
            console.log(data)
            Swal.fire({
                icon: "success",
                title: "Sucesso",
                text: "Trabalho salvo com sucesso !",
                showConfirmButton: false,
                timer: 1500
            });
        })
        .catch(error => {
            console.error(error);
        })
        .finally(() => {
            // Troca de volta para o ícone de salvar quando o processo terminar
            loadingIcon.classList.add('d-none');

            saveIcon.style.display = 'inline'
    
      
        });
    });
})
