<?php

if ( ! class_exists( 'FP_CLI' ) ) {
	return;
}

$fpcli_super_admin_autoloader = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $fpcli_super_admin_autoloader ) ) {
	require_once $fpcli_super_admin_autoloader;
}

FP_CLI::add_command(
	'super-admin',
	'Super_Admin_Command',
	array(
		'before_invoke' => function () {
			if ( ! is_multisite() ) {
				FP_CLI::error( 'This is not a multisite installation.' );
			}
		},
	)
);
