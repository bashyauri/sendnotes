<?php

namespace App\Jobs;

use App\Models\Note;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Note $note)
    {
        $noteUrl = config('app.url') . '/notes/' . $this->note->id;
        $emailContent = "Hello, you've recieved a new note. View it here: {$noteUrl}";
        Mail::raw($emailContent, function ($message) {
            $message->from('sendnotes@technical.com', 'Sendnotes');
            $message->to($this->note->recipient);
            $message->subject('You have a new Note from ' . $this->note->user->name);
        });
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}