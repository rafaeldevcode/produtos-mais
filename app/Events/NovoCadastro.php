<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NovoCadastro
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $nome_usuario;
    public string $nome;
    public string $mensagem;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($nome_usuario, $nome, $mensagem)
    {
        $this->nome_usuario = $nome_usuario;
        $this->nome = $nome;
        $this->mensagem = $mensagem;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
