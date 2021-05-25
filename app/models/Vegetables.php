<?php


namespace app\models;


use Core\Model;
use Core\Validators\RequiredValidator;

class Vegetables extends Model {
    public $id, $name, $description;

    public function __construct($id = "") {
        parent::__construct('fruit');
        $v = null;
        if ($id != "")
            $v = $this->_db->findFirst('fruit', ['conditions' => 'id = ?', 'bind' => [$id]], 'App\Models\Vegetables');
        if ($v) {
            $this->assign($v);
        }
    }

    public function findAll() {
        return $this->find([]);
    }

    public function findById($id) { //name
        return $this->findFirst(['conditions' => "id = ? ", 'bind' => [$id]]);
    }

    public function findByName($name) { //name
        return $this->findFirst(['conditions' => "name = ? ", 'bind' => [$name]]);
    }

    public function validator() {
        $this->runValidation(new RequiredValidator($this, ['field' => 'name', 'msg' => 'Fruit/Veggie name is required.']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'description', 'msg' => 'Description is required.']));
    }

    public function beforeSave() {
        $this->name = ucfirst($this->name);
    }
}