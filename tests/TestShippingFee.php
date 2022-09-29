<?php

namespace CocCocTests;

use PHPUnit\Framework\TestCase;
use TestCocCoc\Controllers\ShippingFee\ShippingFeeController;


class TestShippingFee extends TestCase
{
	use TraitImportDataProducts;

	public function testFeeByDimensionProduct1(): array
	{
		//import setting
		include 'import.php';

		$aDataProducts = $this->importDataProducts();
		$shippingFee = (new ShippingFeeController())
			->setFee([
				'FeeByDimension'
			])
			->setProductData($aDataProducts[0])
			->process();

		$this->assertIsFloat($shippingFee);
		$this->assertEquals(88.0, $shippingFee);
		return $aDataProducts;
	}

	/**
	 * @depends testFeeByDimensionProduct1
	 */
	public function testFeeByWeightProduct2(array $aDataProducts): bool
	{
		$shippingFee = (new ShippingFeeController())
			->setFee([
				'FeeByWeight'
			])
			->setProductData($aDataProducts[0])
			->process();
		$this->assertIsFloat($shippingFee);
		$this->assertEquals(2.2, $shippingFee);
		return true;
	}
}