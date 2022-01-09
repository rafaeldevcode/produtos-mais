@if ($usuario->autorizacao !== 'Leitor')
    <span>
        <a title="Editar" class="btn btn-info btnEditar">
            <i class="fas fa-edit"></i>
        </a>
    </span>
@endif