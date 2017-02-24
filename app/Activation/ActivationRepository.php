<?php

namespace Forum\Activation;

use Carbon\Carbon;
use Illuminate\Database\Connection;

class ActivationRepository
{
    private $db;
    private $table = 'user_activations';

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function createToken($user)
    {
        $activated = $this->get($user);

        if (!$activated) {
            return $this->insertToken($user);
        }

        return $this->regenerateToken($user);
    }

    private function regenerateToken($user)
    {
        $token = $this->getTokenString();
        $this->db->table($table)->where('user_id', $user->id)->update([
            'token'         => $token,
            'created_at'    => new Carbon
        ]);

        return $token;
    }

    private function insertToken($user)
    {
        $token = $this->getTokenString();
        $this->db->table($this->table)->insert([
            'user_id'       => $user->id,
            'token'         => $token,
            'created_at'    => new Carbon
        ]);

        return $token;
    }

    public function get($user)
    {
        return $this->db->table($this->table)->where('user_id', $user->id)->first();
    }

    public function getByToken($token)
    {
        return $this->db->table($this->table)->where('token', $token)->first();
    }

    public function delete($token)
    {
        return $this->db->table($this->table)->where('token', $token)->delete();
    }

    private function getTokenString()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }
}