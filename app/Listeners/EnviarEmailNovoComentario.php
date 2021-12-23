<?php

namespace App\Listeners;

use App\Events\NovoComentario;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\{Auth, Mail};
use App\Mail\EnviarEmailComentario;

class EnviarEmailNovoComentario implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NovoComentario  $event
     * @return void
     */
    public function handle(NovoComentario $event)
    {
        $nome_usuario = Auth::user()->name;
        $usuarios = User::all();

        foreach($usuarios as $indice => $usuario){
            $email = new EnviarEmailComentario(
                $event->nome_marca,
                $nome_usuario,
                $event->nome_cliente, 
                $event->coment_desc, 
                $event->image_cliente, 
                $event->comentario
            );
            $email->subject = 'Novo comentário';
    
            Mail::to($usuario)->later(now()->addSeconds(($indice + 1) * 5), $email);
        }
    }
}
