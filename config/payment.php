<?php

return [
	'stripe' => [
		'secret_key' => 'sk_live_wGAFq26BASJPC9x56Elqso7I',
		'public_key' => 'pk_live_6LmPofwKEth4QOylaKsEjnrU'
	],
	'paypal' => [
		'client_id' => 'ASnpd4URYxeKH8bqz6Otz6OKa0cbFLsjpHVI7JeUaLewbm091MrTX9TzE36V1ncPAFRxcwPELDRDvJMb',
		'secret' => 'EPCykYzh0SSABYCrMjnmrw9MVJiemDrbxYLDiVx38V_K-ly7Mq_uQl0CyV4cJEF6TKfTVEUKb2dSqTaI',
		'settings' => [
			'mode' => 'sandbox',
			'http.ConnectionTimeOut' => 30,
	        'log.LogEnabled' => true,
	        'log.FileName' => storage_path() . '/logs/paypal.log',
	        'log.LogLevel' => 'ERROR'
		]
	]
];