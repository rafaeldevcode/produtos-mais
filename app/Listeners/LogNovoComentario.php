<?php

namespace App\Listeners;

use App\Events\NovoComentario;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LogNovoComentario implements ShouldQueue
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
        Log::channel('main')->info("Novo comentario adicionado a [{$event->nome_marca}] por [{$nome_usuario}]");
    }
}
