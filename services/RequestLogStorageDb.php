<?php

namespace app\services;

use app\interfaces\RequestLogStorageInterface;
use app\models\RequestLog;

class RequestLogStorageDb implements RequestLogStorageInterface
{
	/**
	 * Adds request to storage
	 *
	 * @param int $N
	 * @param int[] $arr
	 * @param int $result
	 * @param int|null $userId
	 */
	public function add(int $N, array $arr, int $result, ?int $userId)
	{
		$model = new RequestLog();

		$model->n = $N;
		$model->arr = json_encode($arr);
		$model->user_id = $userId;
		$model->result = $result;

		$model->save();
	}
}