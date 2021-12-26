<?php

namespace App\Listeners;

use App\Events\NovoCadastro;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LogNovoCadastro implements ShouldQueue
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
     * @param  \App\Events\NovoCadastro  $event
     * @return void
     */
    public function handle(NovoCadastro $event)
    {
        $nome_usuario = Auth::user()->name;
        Log::channel('main')->info("[{$event->mensagem}] [{$event->nome}] por [{$nome_usuario}]");
    }
}
