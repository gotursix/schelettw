<?php


namespace app\models;


use Core\Model;
use Core\Validators\RequiredValidator;

class Questions extends Model {
    public $id, $continent, $question, $photo, $answer1, $answer2, $answer3, $answer4, $correct, $header;

    public function __construct($id = "") {
        parent::__construct('questions');
        $q = null;
        if ($id != "")
            $q = $this->_db->findFirst('questions', ['conditions' => 'id = ?', 'bind' => [$id]], 'App\Models\Questions');
        if ($q) {
            foreach ($q as $key => $val) {
                $this->$key = $val;
            }
        }
    }

    public function findAll() {
        return $this->find([]);
    }

    public function findById($id) {
        return $this->findFirst(['conditions' => "username = ? ", 'bind' => [$username]]);
    }

    public function validator() {
        $this->runValidation(new RequiredValidator($this, ['field' => 'question', 'msg' => 'Question is required.']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'photo', 'msg' => 'Photo is required.']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'answer1', 'msg' => 'Answer 1 is required.']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'answer2', 'msg' => 'Answer 2 is required.']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'answer3', 'msg' => 'Answer 3 is required.']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'answer4', 'msg' => 'Answer 4 is required.']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'header', 'msg' => 'Header is required.']));

    }


}