<?php

	require_once EXTENSIONS . '/apc_cache/cache/cache.apc.php';

	Class Extension_APC_Cache extends Extension {

		private static $provides = array();

		public static function registerProviders() {
			self::$provides = array(
				'cache' => array(
					'APCCache' => APCCache::getName()
				)
			);

			return true;
		}

		public static function providerOf($type = null) {
			self::registerProviders();

			if(is_null($type)) return self::$provides;

			if(!isset(self::$provides[$type])) return array();

			return self::$provides[$type];
		}

	}
