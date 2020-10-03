<?php

namespace Ybaruchel\DisableLazyLoad;

trait DisableLazyLoad
{
	protected function getRelationshipFromMethod($method)
	{
		throw new \BadMethodCallException('Relation lazy load has been disabled for performance reasons. A lazy loaded method found: "'.$method.'" at Line:'.__LINE__);
	}
}
