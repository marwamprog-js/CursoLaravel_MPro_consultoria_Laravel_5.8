<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovoAcesso extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.novoacesso')
            ->with([
                'nome' => $this->user->name,
                'email' => $this->user->email,
                'datahora' => now()->setTimezone('America/Sao_Paulo')->format('d-m-Y H:i:s')
            ])->attach(base_path() . '/pdf/teste.pdf'); //Anexando arquivos
    }
}
