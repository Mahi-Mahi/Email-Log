<?php

namespace MahiMahi\EmailLog\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use MahiMahi\EmailLog\Models\SentMail;


class LogSentMessage
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {

        $data = [
            'from' => $this->parametize($event->message->getFrom()),
            'reply_to' => $this->parametize($event->message->getReplyTo()),
            'to' => $this->parametize($event->message->getTo()),
            'cc' => $this->parametize($event->message->getCc()),
            'bcc' => $this->parametize($event->message->getBcc()),
            'subject' => $event->message->getSubject(),
            'html' => $event->message->getBody(),
            'raw' => $event->message->toString(),
        ];

        SentMail::create($data);

    }
    function parametize($data) {
        if ( is_string($data) )
            return $data;
        if ( is_array($data) )
            return collect($data)->mapWithKeys(function($key, $value){
                return [$key => "$key <$value>"];
              })->values()->join(', ');
    }
}
