<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Mail;

// Model
use App\User;
use App\Team;

// Mail
use App\Mail\JoinRequest;

class SendJoinRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    private $user;
    private $team;

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
    public function __construct($user, $team)
    {
        $this->user = User::find($user);
        $this->team = Team::find($team);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->team->captain())->send(new JoinRequest($this->user, $this->team));
    }
}
