<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use \Carbon\Carbon;

use App\Jobs\SendJoinRequest;
use App\Jobs\SendAcceptRequest;
use App\Jobs\SendRefuseRequest;

use App\User;
use App\Team;
use Imtigger\LaravelJobStatus\JobStatus;


class JobTest extends TestCase
{
    public function testSendAcceptRequest()
    {
        // Get a user
        $user = User::find(2);

        // Faking a new job
        Queue::fake();
        SendAcceptRequest::dispatch($user->id)
                                ->onQueue('default');
        
        // Assert a job was pushed to a given queue
        Queue::assertPushedOn('default', SendAcceptRequest::class);

        // Delete the job from monitoring
        JobStatus::orderBy('created_at', 'desc')->first()->delete();
    }

    public function testSendRefuseRequest()
    {
        // Get a user
        $user = User::find(2);

        // Faking a new job
        Queue::fake();
        SendRefuseRequest::dispatch($user->id)
                                ->onQueue('default');
        
        // Assert a job was pushed to a given queue
        Queue::assertPushedOn('default', SendRefuseRequest::class);

        // Delete the job from monitoring
        JobStatus::orderBy('created_at', 'desc')->first()->delete();
    }

    public function testSendJoinRequest()
    {
        // Get a user & team
        $user = User::find(2);
        $team = Team::find(1);
        

        // Faking a new job
        Queue::fake();
        SendJoinRequest::dispatch($user->id, $team->id)
                                ->onQueue('default');
        
        // Assert a job was pushed to a given queue
        Queue::assertPushedOn('default', SendJoinRequest::class);

        // Delete the job from monitoring
        JobStatus::orderBy('created_at', 'desc')->first()->delete();
    }
}
