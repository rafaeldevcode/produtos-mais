<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $nome_usuario;
    public string $nome;
    public string $mensagem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome_usuario, $nome, $mensagem)
    {
        $this->nome_usuario = $nome_usuario;
        $this->nome_marca = $nome;
        $this->mensagem = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/EnviarEmail');
    }
}
