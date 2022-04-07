<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Parametro;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreated extends Mailable 
{
    use Queueable, SerializesModels;
    public $subject="Rancho Peralta, Usuario Registrado";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        $parametros = DB::select('select *  from parametros where parametro = "VENCIMIENTO_ENLACE"');
        
        return $this->view('seguridad.usuarios.email-usuario')->with(['username'=>$request->username,'password'=>$request->password,'parametros' =>$parametros]);
    }
}
