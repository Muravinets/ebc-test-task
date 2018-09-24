<?php

namespace app\interfaces;

interface RequestLogStorageInterface
{
	/**
	 * Adds request to storage
	 *
	 * @param int $N
	 * @param int[] $arr
	 * @param int $result
	 * @param int|null $userId
	 */
	public function add(int $N, array $arr, int $result, ?int $userId);
}