<?php

namespace app\services;

class RequestLoggerConsole extends RequestLogger
{
	/**
	 * @param int $N
	 * @param int[] $arr
	 * @param int $result
	 * @param int|null $userId Default null
	 */
	public function save(int $N, array $arr, int $result, ?int $userId = null)
	{
		$this->storage->add($N, $arr, $result, $userId);
	}
}