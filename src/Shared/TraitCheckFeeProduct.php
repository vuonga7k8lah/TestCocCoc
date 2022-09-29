<?php

namespace TestCocCoc\Shared;

trait TraitCheckFeeProduct
{
	public function checkFeeProduct(array $aDataProduct): array
	{
		$aFeeProduct = [];
		if (isset($aDataProduct['weight'])) {
			$aFeeProduct[] = 'FeeByWeight';
		}

		if (isset($aDataProduct['width'])&&isset($aDataProduct['height'])&&isset($aDataProduct['depth'])) {
			$aFeeProduct[] = 'FeeByDimension';
		}

		return $aFeeProduct;
	}
}