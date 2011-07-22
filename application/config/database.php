<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
	'rubi_cuiaba2010' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			'hostname'   => 'localhost',
			'database'   => 'rubi_cuiaba2010'.(Kohana::$environment == Kohana::STAGING ? '_dev' : ''),
			'username'   => (Kohana::$environment === Kohana::DEVELOPMENT ? 'root' : 'meritt_php'),
			'password'   => (Kohana::$environment === Kohana::DEVELOPMENT ? 'meritt' : '1g8q4q9dw'),
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => (Kohana::$environment !== Kohana::PRODUCTION),
	),

	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			'hostname'   => 'localhost',
			'database'   => 'rubi_cuiaba2010'.(Kohana::$environment == Kohana::STAGING ? '_dev' : ''),
			'username'   => (Kohana::$environment === Kohana::DEVELOPMENT ? 'root' : 'meritt_php'),
			'password'   => (Kohana::$environment === Kohana::DEVELOPMENT ? 'meritt' : '1g8q4q9dw'),
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => (Kohana::$environment !== Kohana::PRODUCTION),
	)
);
