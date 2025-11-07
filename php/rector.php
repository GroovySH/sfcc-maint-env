<?php
use Rector\CodeQuality\Rector\ClassMethod\OptionalParametersAfterRequiredRector;
use Rector\CodeQuality\Rector\Ternary\ArrayKeyExistsTernaryThenValueToCoalescingRector;
use Rector\Config\RectorConfig;
use Rector\Php71\Rector\FuncCall\RemoveExtraParametersRector;
use Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector;
use Rector\Php54\Rector\Array_\LongArrayToShortArrayRector;
use Rector\Php74\Rector\Ternary\ParenthesizeNestedTernaryRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\ValueObject\PhpVersion;

return static function (RectorConfig $rectorConfig): void {

	// 対象のパスを指定する
	$rectorConfig->paths([
		__DIR__ . '/www.soundhouse.co.jp/fw/app/classes/app_mainte/**',
		__DIR__ . '/www.soundhouse.co.jp/fw/app/classes/maint/**',
		__DIR__ . '/www.soundhouse.co.jp/fw/app/modules/app_mainte/**',
		__DIR__ . '/www.soundhouse.co.jp/fw/app/modules/maint/**',
		__DIR__ . '/www.soundhouse.co.jp/fw/app/views/elements/maint/**',
		__DIR__ . '/www.soundhouse.co.jp/fw/app/views/helpers/maint/**',
		__DIR__ . '/www.soundhouse.co.jp/fw/console/**',
		__DIR__ . '/www.soundhouse.co.jp/fw/core/**',
	]);

	// 指定したバージョンまでで導入された変更を適用する(UP_TO_PHP_XX)
	$rectorConfig->sets([
	    LevelSetList::UP_TO_PHP_84,
	]);

	// リファクタリング後のPHPバージョンの指定
	$rectorConfig->phpVersion(PhpVersion::PHP_84);

	// リファクタリング時に適用しない処理を指定する
	$rectorConfig->skip([
	    LongArrayToShortArrayRector::class, // array() -> []への変換（php-cs-fixer側でリファクタを行う)
	    RemoveExtraParametersRector::class, // function method parameter remove
	    JsonThrowOnErrorRector::class, // json_encode()またはjson_decode()にJSON_THROW_ON_ERRORオプションを渡さない
	    OptionalParametersAfterRequiredRector::class, // デフォルト引数の順番を変更するルール
	]);
};