<?php
$aCoefficient = include_once 'src/Configs/SettingCoefficients.php';
$aConfigFeeBy = include_once 'src/Controllers/ShippingFee/ConfigsFee.php';

\TestCocCoc\Shared\Helpers::bind('coefficient', $aCoefficient);
\TestCocCoc\Shared\Helpers::bind('fee', $aConfigFeeBy);