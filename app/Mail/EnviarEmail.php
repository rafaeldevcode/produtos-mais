<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nome_usuario;
    public $nome;
    public $mensagem;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $nome_usuario, string $nome, string $mensagem)
    {
        $this->nome_usuario = $nome_usuario;
        $this->nome = $nome;
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
