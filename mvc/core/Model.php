<?php


class Model
{
    protected $table;
    protected $primaryKey = "id";

    public static function find($id)
    {
        $model = new static();
        $sql = "SELECT * FROM {$model->table} WHERE {$model->primaryKey} = :id";
        $params = [":id" => $id];
        return DB::get($sql, $params);
    }
    public static function get($id)
    {
        $model = new static();
        $sql = "SELECT * FROM {$model->table} WHERE {$model->primaryKey} = :id";
        $params = [":id" => $id];
        $result = DB::get($sql, $params);

        return new Actions($result, [$model->table, $model->primaryKey]);
    }

    public static function all($limit = 20)
    {
        $model = new static();
        $sql = "SELECT * FROM {$model->table} limit {$limit}";
        return DB::select($sql);
    }

    public static function delete($id = null, $limit = 1)
    {
        $model = new static();
        $sql = "DELETE  FROM {$model->table} WHERE {$model->primaryKey} = :id limit {$limit}";
        $params = [":id" => $id];
        return DB::query($sql, $params);
    }
    public static function save()
    {
        $model = new static();
        return new Actions("", [$model->table, ""]);
    }
}

class Actions
{
    public $id = [];
    public $table;
    public $primaryKey;
    public $data;
    public function __construct($data, $bd)
    {
        $this->table = $bd[0];
        $this->primaryKey = $bd[1];
        $this->data = (array)$data;
        $this->id = [array_key_first((array)$this->data) => $this->data[array_key_first((array)$this->data)]];
    }

    public function update()
    {
        $data = (array)$this;
        $id = array_shift($data["id"]);
        $table = $data["table"];
        $primaryKey = $data["primaryKey"];
        unset($data["primaryKey"], $data["id"], $data["table"], $data["data"]);
        $fieldDetail = "";
        foreach ($data as $field => $value) :
            $fieldDetail .= $field . " = :" . $field . ",";
        endforeach;
        $fieldDetail = substr($fieldDetail, 0, -1);
        $sql = "UPDATE {$table} SET {$fieldDetail} WHERE {$primaryKey} = :{$primaryKey} ";
        $data[$primaryKey] = $id;
        return DB::query($sql, $data);
    }

    public function save()
    {
        $data = (array)$this;
        $id = array_shift($data["id"]);
        $table = $data["table"];
        $primaryKey = $data["primaryKey"];
        unset($data["primaryKey"], $data["id"], $data["table"], $data["data"]);
        $fields = "";
        $values = "";
        foreach ($data as $field => $value) :
            $fields .=  $field . ",";
            $values .=  ":" . $field . ",";
        endforeach;
        $values = substr($values, 0, -1);
        $fields = substr($fields, 0, -1);
        $sql = "INSERT INTO {$table} ($fields) VALUES ({$values})";
        return DB::query($sql, $data);
    }
}
