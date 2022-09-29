<?php

namespace TestCocCoc\Controllers\ShippingFee\FeeBy;


use TestCocCoc\Controllers\ShippingFee\IFee;
use TestCocCoc\Shared\Helpers;

class FeeByWeight implements IFee
{
	protected array $aDataProduct;

	public function setRawData(array $aData): IFee
	{
		$this->aDataProduct = $aData;
		return $this;
	}

	public function handle(): float
	{
		return (float) Helpers::get('coefficient')['weightCoefficient'] * $this->aDataProduct['weight'];
	}
}