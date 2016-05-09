<?php

namespace App\Models;

use PDO;
use UnexpectedValueException;


abstract class DatabaseModel
{
	public $data = [];
	public $errors = [];
	private static $db;

	public function __construct($input = null)
	{
		if(static::$columns){
			foreach (static::$columns as $column) {
				$this->$column = null;
				$this->errors[$column] = null;
			}
		}

		if(is_integer($input) && $input > 0 ){
			//if input is a number, load that record from the db
			$this->find($input);
		}
		if (is_array($input)) {
			//if input is array, load that data from array
			$this->processArray($input);
		}
	}

	private static function getDatabaseConnection() 
	{
			if (! self::$db){
			$dsn = 'mysql:host=localhost;dbname=theadgap;charset=utf8';
			self::$db = new PDO($dsn, 'root', '');

			self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		return self::$db;
	}


	public function processArray($input)
	{
		foreach (static::$columns as $column) {
			if (isset($input[$column])) 
				$this->column = $input[$column];
			}
	}


	public static function all($sortcolumn = "", $asc = true)
	{
		$models = [];

		$db = static::getDatabaseConnection();

		$query ="SELECT " .implode("," , static::$columns). " FROM " . static::$tableName;

		if($sortcolumn){
			if( ! array_search($sortcolumn, static::$columns)){
				throw new UnexpectedValueException("Property $sortcolumn is not found in the columns array.");
			}
			$query .= " ORDER BY " .$sortcolumn;
			if($asc){
				$query .= " ASC";
			} else {
				$query .= " DESC";
			}
		}
		$statement = $db->prepare($query);
		$statement->execute();

		while($record = $statement->fetch(PDO::FETCH_ASSOC)){
			$model = new static();
			$model->data = $record;
			array_push($models, $model);

		}
		
		return $models;
		// var_dump($models);
	}

	public function find($id) 
	{
		$db = static::getDatabaseConnection();
		$query ="SELECT " .implode("," , static::$columns). " FROM " . static::$tableName . 
			" WHERE id = :id ";
		$statement = $db->prepare($query);
		$statement->bindValue(":id", $id);
		$statement->execute();

		while($record = $statement->fetch(PDO::FETCH_ASSOC)) {
			$this->data = $record;
		}
	}

	public function save()
	{
		$db = static::getDatabaseConnection();

		$columns = static::$columns;

		unset($columns[array_search('id', $columns)]);

		$query = "INSERT INTO " . static::$tableName .
		" (". implode(", ", columns) . ")" .
		"VALUES (";

		$insertcols = [];
		foreach ($columns as $column) {
			array_push($insertcols, ":" . $column);
		}

		$query .=implode(",", $insertcols);
		$query .= ")";

		$statement = $db->prepare($query);
		foreach ($columns as $column) {
			$statement->bindValue(":" . $column, $this->$column);
		}

		$result = $statement->execute();
		var_dump($result);
		$this->id =$db->lastInsertId();
		
	}

	public function isValid()
	{
		$valid = true;
		foreach (static::$validationRules as $column => $rules) {
			$this->errors[$column] = null;
			$rules = explode(",", $rules);
			foreach ($rules as $rule) {
				if(strstr($rule, ":")){
					$rule = explode(":", $rule);
					$value = $rule[1];
					$rule = $rule[0];
				}
				switch ($rule) {
					case 'minlength':
						if(strlen($this->$column) < $value){
							$valid = false;
							$this->errors[$column] = "Must be at least $value characters long.";
						}
						break;
					case 'maxlength':
						if(strlen($this->$column) > $value){
							$valid = false;
							$this->errors[$column] = "Must be no more than $value characters long.";
						}
						break;
					case 'numeric':
						if(! is_numeric($this->$column)){
							$valid = false;
							$this->errors[$column] = "Must be a number.";
						}
						break;
				}
			}
			
		}
		return $valid;
	}

	public static function destroy($id)
	{
		$db = static::getDatabaseConnection();
		$query = "DELETE FROM " . static::$tableName . " WHERE id= :id";
		$statement = $db->prepare($query);
		$statement->bindValue(':id', $id);
		$statement->execute();

	}

	public function __get($name)
	{
		if (in_array($name, static::$columns)) {
			
           return $this->data[$name];
         }
        throw new UnexpectedValueException("Property '$name' not found in the data variable.");
    }
	public function __set($name, $value)
	{
		if (! in_array($name, static::$columns)) {
            throw new UnexpectedValueException("Property '$name' not found in the data variable.");
          }
        $this->data[$name] = $value;
 	}

}