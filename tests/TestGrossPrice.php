<?php

namespace CocCocTests;

use PHPUnit\Framework\TestCase;
use TestCocCoc\Controllers\GrossPriceController;

class TestGrossPrice extends TestCase
{
	use TraitImportDataProducts;

	public function testItemPrice(): bool
	{
		//import setting
		include 'import.php';
		$aDataProducts = $this->importDataProducts();

		$itemPrice = GrossPriceController::initSingleton()
			->setProductsData($aDataProducts)
			->process();
		$this->assertIsFloat($itemPrice);
		$this->assertEquals(8487.2, $itemPrice);
		return true;
	}
}