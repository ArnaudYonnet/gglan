<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

use App\Mail\JoinRequest;
use App\Mail\AcceptRequest;
use App\Mail\RefuseRequest;

use App\User;
use App\Team;

class MailTest extends TestCase
{
    public function testAcceptRequest()
    {
        // Get a user
        $user = User::find(2);

        // Faking a accept request mail
        Mail::fake();        
        Mail::to($user)->send(new AcceptRequest($user));

        // Assert
        Mail::assertSent(AcceptRequest::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function testRefuseRequest()
    {
        // Get a user
        $user = User::find(2);

        // Faking a refuse request mail
        Mail::fake();        
        Mail::to($user)->send(new RefuseRequest($user));

        // Assert
        Mail::assertSent(RefuseRequest::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    public function testJoinRequest()
    {
        // Get a team and his captain
        $team = Team::find(1);
        $captain = $team->captain();

        // Get a user who want to join the team
        $user = User::find(2);

        // Faking a join request mail
        Mail::fake();        
        Mail::to($captain)->send(new JoinRequest($user, $team));

        // Assert 
        Mail::assertSent(JoinRequest::class, function ($mail) use ($captain) {
            return $mail->hasTo($captain->email);
        });
    }
}
