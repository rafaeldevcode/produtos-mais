@component('mail::message')

    # Novo comentário adicionado

    # Marca correspondente: {{ $nome_marca }}
    # Usuário: {{ $nome_usuario }}

    ---- Dados do cometário ----
    ## Nome: {{ $nome_cliente }}
    ## Descrção do comentário: {{ $coment_desc }}
    ## Imagem do cliente: {{ $image_cliente }}
    ## Comentário: {{ $comentario }}

@endcomponent