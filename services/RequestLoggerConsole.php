<?php

namespace app\services;

class RequestLoggerConsole extends RequestLogger
{
	/**
	 * {@inheritdoc}
	 */
	public function save(int $interfaceType, int $N, array $arr, int $result, ?int $userId = null)
	{
		$this->storage->add($interfaceType, $N, $arr, $result, $userId);
	}
}
