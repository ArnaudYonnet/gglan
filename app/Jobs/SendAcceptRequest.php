<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Imtigger\LaravelJobStatus\Trackable;

use Illuminate\Support\Facades\Mail;

// Model
use App\User;

// Mail
use App\Mail\AcceptRequest;

class SendAcceptRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Trackable;

    private $user;

    /**
     * Number of tries before job fail
     *
     * @var integer
     */
    public $tries=3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->prepareStatus();
        
        $this->user = User::find($user);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new AcceptRequest());
    }
}
