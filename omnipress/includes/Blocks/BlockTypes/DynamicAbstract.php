<?php

namespace Omnipress\Blocks\BlockTypes;

use Omnipress\Abstracts\AbstractBlock;

/**
 * Class DynamicAbstract
 */
abstract class DynamicAbstract extends AbstractBlock {
	protected function get_schema_boolean( mixed $default = true ): array {
		return array(
			'type'    => 'boolean',
			'default' => $default,
		);
	}

	protected function get_schema_string( mixed $default = '' ): array {
		return array(
			'type'    => 'string',
			'default' => $default,
		);
	}


	protected function get_schema_number( mixed $default = 0 ): array {
		return array(
			'type'    => 'number',
			'default' => $default,
		);
	}
}
