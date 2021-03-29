<?php

namespace App\Models;

use Core\Model;
use Core\H;

class Scores extends Model {
    public $id, $points, $difficulty, $name;

    public function __construct() {
        parent::__construct('scores');
    }

    public function findByDifficulty($difficulty) {
        return $this->query("SELECT scores.id, users.username, scores.points, scores.difficulty FROM scores JOIN users on scores.user_id = users.id WHERE scores.difficulty LIKE ? ORDER BY scores.points DESC, users.username", [$difficulty])->results();
    }
}