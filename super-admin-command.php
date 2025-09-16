<?php

if ( ! class_exists( 'FIN_CLI' ) ) {
	return;
}

$fincli_super_admin_autoloader = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $fincli_super_admin_autoloader ) ) {
	require_once $fincli_super_admin_autoloader;
}

FIN_CLI::add_command(
	'super-admin',
	'Super_Admin_Command',
	array(
		'before_invoke' => function () {
			if ( ! is_multisite() ) {
				FIN_CLI::error( 'This is not a multisite installation.' );
			}
		},
	)
);
