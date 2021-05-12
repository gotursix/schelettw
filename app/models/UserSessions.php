<?php

namespace App\Models;

use Core\Session;
use Core\Cookie;
use Core\Model;


class UserSessions extends Model {

    public $id, $user_id, $session, $user_agent;
    public static $queueForTitle, $queueForDescription;

    public function __construct() {
        $table = 'user_sessions';
        parent::__construct($table);
        $queueForTitle = new \SplQueue();
        $queueForDescription = new \SplQueue();
    }

    public static function getFromCookie() {
        $userSession = new self();
        if (Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
            $userSession = $userSession->findFirst([
                'conditions' => "user_agent = ? AND session = ?",
                'bind' => [Session::uagent_no_version(), Cookie::get(REMEMBER_ME_COOKIE_NAME)]
            ]);
        }
        if (!$userSession) return false;
        return $userSession;
    }
}