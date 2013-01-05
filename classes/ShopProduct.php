<?php
class ShopProduct {
	
private $title;
private $producerMainName;
private $producerFirstName;
protected $price;
private $discount = 0;
private $id = 0;

	public function __construct($title, $firstName, $mainName, $price) {
		$this->title				= $title;
		$this->producerFirstName	= $firstName;
		$this->producerMainName		= $mainName;
		$this->price				= $price;
	}
	
	public function setId($id) {
		$this->id = $id;	
	}
	
	public static function getInstance($id, DB_common $db) {
		$query = "select * from product where id='$id'";
		$query_result = $db->query($query);
		
		if(DB::isError($query_result)){
			die($query_result->getMessage());
		}
		
		$row = $query_result->fetchRow(DB_FETCHMODE_ASSOC);
		if( empty ( $row ) ){ return null; }
		
		if($row['type'] == "book") {
			$product = new BookProduct(
				$row['title'],
				$row['firstname'],
				$row['mainname'],
				$row['price'],
				$row['numpages']
			);
		} elseif($row['type']=="cd") {
			$product = new CdProduct(
				$row['title'],
				$row['firstname'],
				$row['mainname'],
				$row['price'],
				$row['playlength']
			);
		} else {
			$product = new ShopProduct(
				$row['title'],
				$row['firstname'],
				$row['mainname'],
				$row['price']
			);
		}
		$product->setId($row['id']);
		$product->setDiscount($row['discount']);
		return $product;
		
	}
	
	public function getProducerFirstName() {
		return $this->producerFirstName;
	}
	
	public function getProducerMainName() {
		return $this->producerMainName;
	}
	
	public function getProducer() {
		return "{$this->producerFirstName} "."{$this->producerMainName}";
	}
	
	public function setDiscount($num) {
		$this->discount = $num;
	}
	
	public function getDiscount() {
		return $this->discount;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getPrice() {
		return ($this->price - $this->discount);
	}
	
	public function getSummaryLine() {
		$base = "Title: {$this->title}" . "<br/>";
		$base .= "Artist First: {$this->producerFirstName}" . "<br/>";
		$base .= "Artist Last: {$this->producerMainName}" . "<br/>";
		return $base;
	}
	
	

}
	
?>