<?php

namespace app\interfaces;

interface RequestLoggerInterface
{
	/**
	 * Saves request
	 *
	 * @param int $N
	 * @param int[] $arr
	 * @param int $result
	 * @param int $userId
	 */
	public function save(int $N, array $arr, int $result, int $userId);
}