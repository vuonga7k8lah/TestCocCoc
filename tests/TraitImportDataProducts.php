<?php

namespace CocCocTests;

trait TraitImportDataProducts
{
	public function importDataProducts(): array
	{
		return [
			[
				'title'  => 'iphone 14 pro',
				'price'  => 2000,
				'height' => 2,
				'width'  => 2,
				'depth'  => 2,
				'weight' => 0.2
			],
			[
				'title'  => 'macbook',
				'price'  => 5000,
				'height' => 5,
				'width'  => 5,
				'depth'  => 5,
				'weight' => 2
			]
		];
	}
}