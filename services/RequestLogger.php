<?php  namespace app\services; 

use app\models\RequestHistory;

class RequestLogger
{
	/**
	 * @param int $N
	 * @param int[] $arr
	 * @param int $result
	 * @param int $userId
	 */
	public function save(int $N, array $arr, int $result, int $userId)
	{
		$model = new RequestHistory();
		$model->n = $N;
		$model->arr = json_encode($arr);
		$model->user_id = $userId;
		$model->result = $result;

		$model->save();
	}
}