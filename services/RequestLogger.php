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
	 * {@inheritdoc}
	 */
	public function save(int $interfaceType, int $N, array $arr, int $result, int $userId)
	{
		$this->storage->add($interfaceType, $N, $arr, $result, $userId);
	}
}
