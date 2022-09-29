<?php

namespace TestCocCoc\Controllers\ShippingFee;


use TestCocCoc\Shared\Helpers;

class ShippingFeeController
{
	protected array $aFee;
	protected array $aProductData;

	public function setFee(array $aRawFee): ShippingFeeController
	{
		$this->aFee = $aRawFee;
		return $this;
	}

	public function setProductData(array $aProductData): ShippingFeeController
	{
		$this->aProductData = $aProductData;
		return $this;
	}

	private function handleShippingFee(): float
	{
		$totalShippingFee = 0;
		if (!empty($this->aFee)) {
			$aFee = Helpers::get('fee');
			foreach ($this->aFee as $fee) {
				if (!isset($aFee[$fee])) {
					continue;
				}
				$oFee = new $aFee[$fee];
				if ($oFee instanceof IFee) {
					$totalShippingFee += $oFee->setRawData($this->aProductData)->handle();
				}
			}
		}
		return $totalShippingFee;
	}

	public function process(): float
	{
		return  $this->handleShippingFee();
	}
}