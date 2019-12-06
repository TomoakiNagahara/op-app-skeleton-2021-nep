<?php
/**
 * app-skeleton-2020-nep:/app.php
 *
 * @created   2014-02-24
 * @updated   2016-11-22
 * @updated   2019-11-18
 * @version   1.0
 * @package   app-skeleton-2019-nep
 * @author    Tomoaki Nagahara <tomoaki.nagahara@gmail.com>
 * @copyright Tomoaki Nagahara All right reserved.
 */

 /** namespace
 *
 * @created   2019-12-12
 */
namespace OP;

/**	Execute time.
 *
 * @created
 * @moved     2019-12-12   asset:/app.php --> app:/app.php
 * @changed   2019-01-03   $st --> _OP_APP_START_
 */
define('_OP_APP_START_', microtime(true));

/** Launch onepiece-framework core.
 *
 * @created  2019-11-18
 */
require('asset/app.php');

/** Launch application.
 *
 * @created
 * @moved     2019-12-12   asset:/app.php --> app:/app.php
 */
try {
	/* @var $app IF_APP */
	$app = Unit::Singleton('App');

	//	Launch application.
	$app->Auto();

	//	Output memory usage.
	if( Env::isAdmin() and (Env::Mime() === 'text/html') ){
		$app->Template('app.phtml');
	};

} catch ( \Throwable $e ){
	Notice::Set($e);
}