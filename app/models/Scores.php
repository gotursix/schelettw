<?php

namespace App\Models;

use Core\Model;

class Scores extends Model {
    public $id, $points, $difficulty, $user_id;

    public function __construct() {
        parent::__construct('scores');
    }

    public function findScore($user_id, $difficulty) {
        return $this->findFirst(['conditions' => ["user_id = ? ", "difficulty = ?"], 'bind' => [$user_id,$difficulty]]);
    }

    public function getScoresForProfile($user_id){
        return $this->query("SELECT * FROM `scores` WHERE scores.user_id = ?", [$user_id])->results();
    }

    public function findByDifficulty($difficulty) {
        return $this->query("SELECT scores.id, users.username, scores.points, scores.difficulty FROM scores JOIN users on scores.user_id = users.id WHERE scores.difficulty LIKE ? ORDER BY scores.points DESC, users.username", [$difficulty])->results();
    }

    public function findByDifficultyTop($difficulty, $count) {
        return $this->query("SELECT scores.id, users.username, scores.points, scores.difficulty FROM scores JOIN users on scores.user_id = users.id WHERE scores.difficulty LIKE ? ORDER BY scores.points DESC, users.username LIMIT " . $count, [$difficulty])->results();
    }

    public function findAllDifficulty() {
        return $this->query("SELECT scores.id, users.username, scores.points, scores.difficulty FROM scores JOIN users on scores.user_id = users.id ORDER BY scores.points DESC, users.username", [])->results();
    }

    public function findAllDifficultyTop($count) {
        return $this->query("SELECT scores.id, users.username, scores.points, scores.difficulty FROM scores JOIN users on scores.user_id = users.id ORDER BY scores.points DESC, users.username LIMIT " . $count, [])->results();
    }

    public function getMinimumScore($difficulty) {
        return (int)$this->query("SELECT  scores.points FROM scores WHERE scores.difficulty LIKE ?  ORDER BY scores.points DESC LIMIT 8 OFFSET 9", [$difficulty])->results()[0]->points;
    }


}