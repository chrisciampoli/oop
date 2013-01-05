<?php

class BookProduct extends ShopProduct {
    private $numPages = 0;
	
	public function __construct($title,$firstName,$mainName,$price,$numPages) {
		parent::__construct($title, $firstName, $mainName, $price);
		$this->numPages = $numPages;
	}
	
	public function getNumberofPages() {
		return $this->numPages;
	}
	
	public function getSummaryLine() {
		$base = parent::getSummaryLine();
		$base .= "This book has a total of {$this->numPages} pages." . "<br/>";
		return $base;
	}
	
	public function getPrice() {
		return $this->price;
	}
}

?>
