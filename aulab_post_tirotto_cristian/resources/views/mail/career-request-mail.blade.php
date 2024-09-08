<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>E arrivata una richiesta per il ruolo di {{$info['role']}}</h1>
    <p>Ricevuta da {{$info['email']}}</p>
    <h4>Messaggio:</h4>
    <p>{{$info['message']}}</p>


    class CareerRequestMail extends Mailable

      

 
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
              )};

</body>
</html>