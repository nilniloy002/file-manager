<?php

namespace Modules\Files\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShareLinks extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $fromEmail;
    public $toEmail;
    public $msgText;
    public $url;
   

    /**
     * Create a new instance.
     *
     * @param string $firstName
     * @return void
     */
    public function __construct($fromEmail,$toEmail,$msgText,$url)
    {
        $this->fromEmail = $fromEmail;
        $this->toEmail = $toEmail;
        $this->msgText = clean($msgText);
        $this->url = $url;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('files::mail.share_links', ['name'=>$this->fromEmail]))
            ->view("files::admin.emails.share_links", [
                'logo' => NULL,
                'fromEmail' => $this->fromEmail,
                'toEmail'=>$this->toEmail,
                'msgText' => $this->msgText,
                'url'=>$this->url
            ]);
    }
}
