<?php

namespace TestCocCoc\Shared;

class Helpers
{
	public static array $aConfig = [];

	public static function bind(string $key, array $aData): bool
	{
		self::$aConfig[$key] = $aData;
		return true;
	}

	public static function get(string $key)
	{
		return array_key_exists($key, self::$aConfig) ? self::$aConfig[$key] : '';
	}
}