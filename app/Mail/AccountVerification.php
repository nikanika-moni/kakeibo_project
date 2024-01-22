<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Notifications\Messages\MailMessage;

// class CustomMailMessage extends MailMessage
// {
//     public $email_token;

//     public function emailToken($token)
//     {
//         $this->email_token = $token;

//         return $this;
//     }
// }


class AccountVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        protected User $user,)
    {}

    public function envelope()
    {
        return new Envelope(
            from: 'test@example.co.jp',
            subject: '会員登録のお礼'
        );
    }

    public function content(): Content
    {
        return new Content(
            text: 'emails.admin',
            with: [
                'email_token' => $this->user->email_token,
                'userId' => $this->user->id,
            ],
        );
    }
}
