<?php
namespace Horasachy\Mail;
use Illuminate\Support\Facades\Mail;


final class TestMail {
    public function sendMail(string $clientEmail)
    {
        try {
            $this->prepareMail($clientEmail);
        } catch (Exception $e) {
            echo 'Ошибка отправки письма: ',  $e->getMessage(), "\n";
        }
    }

    public function prepareMail($clientEmail)
    {
        foreach ($this->variablePreparation($clientEmail) as $key => $val)
            $$key = $this->variablePreparation($clientEmail)[$key];

        return
            Mail::send(
                ['text' => $view],
                ['name', $name],
                function ($msg) use ($clientEmail){
                    $msg->to($clientEmail)->subject('Test');
                    $msg->from($clientEmail)->subject('Test');
                }
            );
    }
    public function variablePreparation(string $clientEmail) : array
    {
       if(
           env('APP_ENV') == 'prodation' ||
           strripos(
               env('APP_URL'),
               'https'
           )
       )
           $clientEmail = config('mail.local');

       $view = view('mail::mail');
       $name = 'Horasachy';

       return
            [
                'cliendEmail' => $clientEmail,
                'view' => $view,
                'name' => $name
            ];

    }
}
