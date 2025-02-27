<?php

namespace Project\Auth\Infrastructure\Mail\Mailable;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidateEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $email;
    public string $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $url)
    {
        $this->name = $name;
        $this->email = $email;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('no-reply@yourdomain.com', 'Felipe Nieto')
            ->to($this->email)
            ->subject('Verifica tu correo')
            ->view('mail.auth.verify')
            ->with([
                'name' => $this->name,
                'url' => $this->url,
            ]);

    }
}
