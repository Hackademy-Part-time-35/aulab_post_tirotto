<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new Middleware('auth', except:['homepage'])
        ];
    }

    public function homepage (){

        $articles =Article::orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles'));
    }

    public function careers(){
        return view('careers');
    }

    public function careersSubmit(Request $request){
        $request->validate([
            'role'=> 'required',
            'email'=> 'required|email',
            'message'=>'required'
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email =$request->email;
        $message = $request->message;
        $info = compact('role', 'email', 'message');

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail($info));


        switch ($role){

            case 'admin':

                $user->is_admin = NULL;
                     break;
                case 'revisor':
                   $user->is_revisor = NULL;
                   break;
                case 'writer':
                    £user->is_writer = NULL;
                    break;
        }

        $user->update();
        return redirect(route('homepage'))->with('message', 'Mail inviata con successo!');
         
        


    }

    class CareerRequestMail extends Mailable

      {

 
        use Queuelable, SerializesModels;

        public $info;

        public function__construct($info){

            $this->info= $info;
        }
        public function envelope(): Envelope{

            return view Envelope(
                subject: 'Nuova richiesta di lavoro ricevuta',
            );

        }     

        public function content(): Content{

            return new Content(
                view: 'mail.career-request-mail',
            );
        }

    }




}
