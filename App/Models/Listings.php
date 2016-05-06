<?php

namespace App\Models;

use PDO;
use UnexpectedValueException;


class Listings
{
	public $data;

	private static function getDatabaseConnection() 
	{
		
			$dsn = 'mysql:host=localhost;dbname=theadgap;charset=utf8';
			$db = new PDO($dsn, 'root', '');

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		return $db;
	}
	public static function all()
	{
		$models = [];

		$db = self::getDatabaseConnection();

		$statement = $db->prepare("SELECT id, category, title, currentPrice, auctionEndDateTime, auctionStartDateTime, location, description FROM listings;");

		$statement->execute();

		// $record = $statement->fetch(PDO::FETCH_ASSOC);

		while($record = $statement->fetch(PDO::FETCH_ASSOC)){
			$model = new Listings();
			$model->data = $record;
			array_push($models, $model);

		}
		
		return $models;
		// var_dump($models);
	}

	public function __get($name)

	{
		if (array_key_exists($name, $this->data)) {

			return $this->data[$name];
				var_dump($name);

		}
		throw new UnexpectedValueException("Property $name not found in the data variable.");
	}

}