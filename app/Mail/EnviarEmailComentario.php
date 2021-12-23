<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarEmailComentario extends Mailable
{
    use Queueable, SerializesModels;

    public string $nome_marca;
    public string $nome_usuario;
    public string $nome_cliente;
    public string $coment_desc;
    public string $image_cliente;
    public string $comentario;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome_marca, $nome_usuario, $nome_cliente, $coment_desc, $image_cliente, $comentario)
    {
        $this->nome_marca = $nome_marca;
        $this->nome_usuario = $nome_usuario;
        $this->nome_cliente = $nome_cliente;
        $this->coment_desc = $coment_desc;
        $this->image_cliente = $image_cliente;
        $this->comentario = $comentario;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/EnviarEmailComentario');
    }
}
