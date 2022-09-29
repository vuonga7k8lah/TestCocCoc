<?php

namespace TestCocCoc\Controllers;

class GrossPriceController
{
	protected static $_self;
	protected array  $aProductsData;

	public static function initSingleton(): GrossPriceController
	{
		if (self::$_self == null) {
			self::$_self = new  self();
		}
		return self::$_self;
	}

	public function setProductsData(array $aData): GrossPriceController
	{
		$this->aProductsData = $aData;
		return $this;
	}

	public function process(): float
	{
		$grossPrice = 0;

		if (!empty($this->aProductsData)) {
			foreach ($this->aProductsData as $aProductData) {
				$grossPrice += ItemPriceController::initSingleton()->setDataItem($aProductData)->process();
			}
		}

		return $grossPrice;
	}
}