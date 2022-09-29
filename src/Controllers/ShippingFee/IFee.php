<?php

namespace TestCocCoc\Controllers\ShippingFee;

interface IFee
{
	public function setRawData(array $aData):IFee;

	public function handle();
}