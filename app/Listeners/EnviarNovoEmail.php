<?php

namespace App\Listeners;

use App\Events\NovoCadastro;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\{Auth, Mail};
use App\Mail\EnviarEmail;

class EnviarNovoEmail implements ShouldQueue
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
        $usuarios = User::all();

        foreach($usuarios as $indice => $usuario){
            $email = new EnviarEmail(
                Auth::user()->name,
                $event->nome,
                $event->mensagem
            );
            $email->subject("{$event->mensagem} em produtos +");

            Mail::to($usuario)->later(now()->addSeconds(($indice + 1) * 5), $email);
        }
    }
}
