<div class="modal fade" id="addPageModal" tabindex="-1" aria-labelledby="addPageModalLabel" aria-hidden="true"  data-bs-keyboard="false">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPageModalLabel">Adicionar Nova Página</h5>
                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('page.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="portfolio_id" value="{{$portfolio->id}}">
                    <input type="text" placeholder="Título da Página" class="form-control" name="title" required>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary btn-sm">Criar</button>
                </form>
            </div>
        </div>
    </div>
</div>