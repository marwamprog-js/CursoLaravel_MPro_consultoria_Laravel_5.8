<?php

namespace App\Listeners;

use App\Mail\NovoAcesso;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class LoginListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        info($event->user->name);
        info($event->user->email);
        $quando = now()->addMinute(5);

        //User, users[], email
        Mail::to($event->user)
            // ->send(new NovoAcesso($event->user));
            // ->queue(new NovoAcesso($event->user)); //Manda para o redis a responsabilidade de enviar email
            ->later($quando, new NovoAcesso($event->user)); //Ação de postergar o evento, ou seja, sera processado depois de um tempo
    }
}
