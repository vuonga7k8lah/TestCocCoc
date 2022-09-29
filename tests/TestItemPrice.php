<?php

namespace CocCocTests;

use PHPUnit\Framework\TestCase;
use TestCocCoc\Controllers\ItemPriceController;

class TestItemPrice extends TestCase
{
	use TraitImportDataProducts;

	public function testItemPrice(): bool
	{
		//import setting
		include 'import.php';
		$aDataProducts = $this->importDataProducts();

		$itemPrice =ItemPriceController::initSingleton()
			->setDataItem($aDataProducts[0])
			->process();
		$this->assertIsFloat($itemPrice);
		$this->assertEquals(2090.2,$itemPrice);
		return true;
	}

}