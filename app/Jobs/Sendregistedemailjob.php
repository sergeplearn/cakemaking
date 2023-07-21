<?php

namespace App\Jobs;

use App\Mails\registeduser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class Sendregistedemailjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $User;

    public function __construct($User)
    {
        $this->User = $User;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new registeduser();

        Mail::to($this->$User['email'], $this->$User['name'])->send($email);
    }
}
