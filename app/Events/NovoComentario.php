<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NovoComentario
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $nome_marca;
    public string $nome_cliente; 
    public string $coment_desc; 
    public string $image_cliente; 
    public string $comentario;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($nome_marca, $nome_cliente, $coment_desc, $image_cliente, $comentario)
    {
        $this->nome_marca = $nome_marca;
        $this->nome_cliente = $nome_cliente;
        $this->coment_desc = $coment_desc;
        $this->image_cliente = $image_cliente;
        $this->comentario = $comentario;
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
