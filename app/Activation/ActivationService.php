<?php

namespace Forum\Activation;

use App;
use Forum\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class ActivationService
{
    private $mailer, $repository, $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $repository)
    {
        $this->mailer = $mailer;
        $this->repository = $repository;
    }

    public function sendMail($user)
    {
        App::setLocale($user->locale);
        $token = $this->repository->createToken($user);

        $this->mailer->send('auth.emails.activation', ['token' => $token, 'user' => $user], function ($m) use ($token, $user) {
            $m->to($user->email)->subject(trans('auth.activation.email.subject'));
        });
    }

    public function activateUser($token)
    {
        $activation = $this->repository->getByToken($token);

        if ($activation)
        {
            $user = User::find($activation->user_id);
            $user->activated = true;
            $user->save();
            $this->repository->delete($token);
            return $user;
        }

        return null;
    }

    public function manuallyActivateUser($user)
    {
        $activation = $this->repository->get($user);

        if ($activation)
        {
            $user->activated = true;
            $user->save();
            $this->repository->delete($activation->token);
            return $user;
        }

        return null;
    }

    public function shouldSend($user)
    {
        $activation = $this->repository->get($user);
        return $activation == null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }
}