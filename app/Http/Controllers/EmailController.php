<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EnviarEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $email = new EnviarEmail(
            'Rafael Vieira', 
            'Ótimo', 
            'image-1.png', 
            'Comentario'
        );
        $email->subject = 'Novo comentário';

        $user = [
            'email' => 'rafaelvieirapalmital@outlook.com'
        ];

        Mail::to($user)->send($email);

        return 'Enviado com sucesso';
    }
}
