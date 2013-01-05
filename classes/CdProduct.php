<?php

class CdProduct extends ShopProduct {
	
	private $playLength = 0;
	
	function __construct($title, $firstName, $mainName, $price, $playLength) {
		parent::__construct($title, $firstName, $mainName, $price);
		$this->playLength = $playLength;
		
    }

    function getPlayLength() {
	   return $this->playLength;
    }
	
	function getSummaryLine() {
		$base = parent::getSummaryLine();
		$base .= "Playtime for this CD: " . $this->playLength;
		return $base;
	}
}

?>
