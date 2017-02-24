<?php

namespace Forum\Console\Commands;

use App;
use Forum\User;
use Illuminate\Mail\Mailer;
use Illuminate\Console\Command;

class Email extends Command
{
    protected $signature = 'email {type}';
    protected $description = 'Send an email to all users';

    private $mailer;

    public function __construct(Mailer $mailer)
    {
        parent::__construct();
        $this->mailer = $mailer;
    }

    public function handle()
    {
        $type = $this->argument('type');

        if ($type === "notifications")
        {
            foreach (User::getEmailList() as $user)
            {
                App::setLocale($user->locale);
                $unread = $user->getUnseenNotificationsCount();

                if ($unread)
                {
                    $this->mailer->send('user.emails.notifications', ['user' => $user], function ($m) use ($unread, $user) {
                        $m->to($user->email)->subject(trans_choice('user.email.notifications.subject', $unread, ['unread' => $unread]));
                    });

                    $this->info('Sending ' . $type . ' email for ' . $user->fullName() . '.');
                }
                else
                {
                    $this->info('Skipping ' . $user->fullName() . '.');
                }
            }
        }
        else
        {
            $this->error("Invalid email type.");
        }
    }
}
