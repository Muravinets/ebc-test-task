<?php

namespace app\services;

use app\interfaces\RequestLogStorageInterface;
use app\models\RequestLog;

class RequestLogStorageDb implements RequestLogStorageInterface
{
	/**
	 * Adds request to DB storage
	 *
	 * {@inheritdoc}
	 */
	public function add(int $interfaceType, int $N, array $arr, int $result, ?int $userId)
	{
		$model = new RequestLog();

		$model->interface_type = $interfaceType;
		$model->n = $N;
		$model->arr = json_encode($arr);
		$model->user_id = $userId;
		$model->result = $result;

		$model->save();
	}
}
