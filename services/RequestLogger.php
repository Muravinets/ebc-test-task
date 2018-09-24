<?php

namespace app\services;

use app\interfaces\RequestLoggerInterface;
use app\interfaces\RequestLogStorageInterface;

class RequestLogger implements RequestLoggerInterface
{
	/**
	 * @var RequestLogStorageInterface
	 */
	protected $storage;

	public function __construct(RequestLogStorageInterface $storage)
	{
		$this->storage = $storage;
	}

	/**
	 * @param int $N
	 * @param int[] $arr
	 * @param int $result
	 * @param int $userId
	 */
	public function save(int $N, array $arr, int $result, int $userId)
	{
		$this->storage->add($N, $arr, $result, $userId);
	}
}
