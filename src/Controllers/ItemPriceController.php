<?php

namespace TestCocCoc\Controllers;

use TestCocCoc\Controllers\ShippingFee\ShippingFeeController;
use TestCocCoc\Shared\TraitCheckFeeProduct;

class ItemPriceController
{
	use TraitCheckFeeProduct;

	protected static $_self;
	protected array  $aProductData;

	public static function initSingleton(): ItemPriceController
	{
		if (self::$_self == null) {
			self::$_self = new  self();
		}
		return self::$_self;
	}

	public function setDataItem(array $aData): ItemPriceController
	{
		$this->aProductData = $aData;
		return $this;
	}

	public function process():float
	{
		$aFeeProduct = $this->checkFeeProduct($this->aProductData);
		$shippingFee = (new ShippingFeeController())
			->setFee($aFeeProduct)
			->setProductData($this->aProductData)
			->process();
		return $this->aProductData['price'] + $shippingFee;
	}
}