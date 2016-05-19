<?php

namespace App\Models;
use PDO;

class Listings extends DatabaseModel
{
	
	protected static $tableName = "listings";
	protected static $columns = ['id', 'user_id','category', 'title','url', 'buyNowPrice', 'location', 'description'];
	protected static $smartColumns = ['tags'];
	protected static $validationRules = [
									"category"    => "minlength:1",
									"title"       => "minlength:1",
									"buyNowPrice" => "numeric",
									"location"    => "minlength:1",
									"description" => "minlength:10,maxlength:500",
	];
	public function comments()
	{
		$result = Comment::allBy('listing_id', $this->id);
		return $result;
	}

	public function getTags()
	{
		$models = [];
		$db = static::getDatabaseConnection(); 

		$query =" SELECT id, tag FROM tags ";
		$query .= " JOIN listings_tag ON id = tag_id ";
		$query .= " WHERE listing_id =:id";

		$statement= $db->prepare($query);
		$statement->bindValue(":id", $this->id);
		$statement->execute();

		while($record = $statement->fetch(PDO::FETCH_ASSOC)){
			$model = new Tags();
			$model->data = $record;
			array_push($models, $model);
		}
		return $models;
	}
	public function loadTags()
	{
		$tags = $this->getTags();
		$taglist = [];
		foreach ($tags as $tag) {
			array_push($taglist, $tag->tag);
		}
		$this->tags = implode(",", $taglist);
	}

	public function saveTags()
	{
		// take the string from tags property
		//  explode it into an array
		$tags = explode(",", $this->tags);
		foreach ($tags as $tag) {
			$tag = trim($tag);
		}

		$db = static::getDatabaseConnection();

		$db->beginTransaction();

		try {
			$this->addNewTags($db, $tags);
			$tagIds = $this->getTagIds($db, $tags);
			$this->deleteAllTagsFromListing($db);
			$this->insertTagsForListing($db, $tagIds);
	
			$db->commit();

		} catch (Exception $e) {

			$db->rollback();
			throw $e;
		}
	}
	private function addNewTags($db, $tags)
	{
		// insert each tag into the tags table (ignore all duplicates)
		$query = "INSERT IGNORE INTO tags (tag) VALUES ";

		$tagvalues = [];
		for ($i=0; $i < count($tags); $i++) { 
			array_push($tagvalues, "(:tag{$i})");
		}
		$query .= implode(",", $tagvalues);
		$statement = $db->prepare($query);
		for ($i=0; $i < count($tags); $i++) { 
			$statement->bindValue(":tag{$i}", $tags[$i]);
		}
		$statement->execute();	
	}
	private function getTagIds($db, $tags)
	{
		//getting the Id for each tags
		$query = "SELECT id FROM tags WHERE ";
		$tagvalues = [];
		for ($i=0; $i < count($tags); $i++) { 
			array_push($tagvalues, "tag =:tag{$i}");
		}
		$query .= implode(" OR ", $tagvalues);
		$statement = $db->prepare($query);
		for ($i=0; $i < count($tags); $i++) { 
			$statement->bindValue(":tag{$i}", $tags[$i]);
		}
		$statement->execute();

		$record = $statement->fetchAll(PDO::FETCH_COLUMN);
		return $record;
	}
	private function insertTagsForListing($db, $tagIds)
	{
		$query = "INSERT IGNORE INTO listings_tag (listing_id, tag_id) VALUES ";

		$tagvalues = [];
		for ($i=0; $i < count($tagIds); $i++) { 
			array_push($tagvalues, "(:listing_id_{$i}, :tag_id_{$i})");
		}
		$query .= implode(",", $tagvalues);
		$statement = $db->prepare($query);
		for ($i=0; $i < count($tagIds); $i++) { 
			$statement->bindValue(":listing_id_{$i}", $this->id);
			$statement->bindValue(":tag_id_{$i}", $tagIds[$i]);
		}
		$statement->execute();
	}
	private function deleteAllTagsFromListing($db)
	{
		$query = "DELETE FROM listings_tag WHERE listing_id= :listing_id";
		$statement = $db->prepare($query);
		$statement->bindValue(":listing_id", $this->id);
		$statement->execute();
	}

}