<?php  namespace app\models; 

use yii\base\Model;

/**
 * Class TestTaskRequest
 *
 * @package app\models
 */
class TestTaskRequest extends Model
{
	/**
	 * @var int
	 */
	public $N;

	/**
	 * @var int[]
	 */
	public $arr;

	public function formName()
	{
		return '';
	}

	public function rules()
	{
		return [
			[['N', 'arr'], 'required'],
			['N', 'integer'],
			// checks if every array item is an integer
			['arr', 'each', 'rule' => ['integer']],
		];
	}
}
