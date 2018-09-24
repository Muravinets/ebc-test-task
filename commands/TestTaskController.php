<?php

namespace app\commands;

use app\interfaces\TestTaskSolverInterface;
use yii\base\Module;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command processes task with the arguments that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 */
class TestTaskController extends Controller
{

	/**
	 * @var TestTaskSolverInterface
	 */
	protected $testTaskSolver;

	public function __construct(
		string $id,
		Module $module,
		TestTaskSolverInterface $testTaskSolver,
		array $config = []
	)
	{
		$this->testTaskSolver = $testTaskSolver;

		parent::__construct($id, $module, $config);
	}

	/**
	 * This command processes task with the arguments that you have entered.
	 *
	 * @param int $N the integer number
	 * @param int[] $arr Array of integers
	 * @param int|null $userId User ID, optional. Null by default
	 *
	 * @return int Exit code
	 */
    public function actionIndex(int $N, array $arr, ?int $userId = null)
    {
        array_walk($arr, function (string &$value) {
            $value = (int)$value;
        });

	    $res = $this->testTaskSolver->process($N, $arr);

        echo $res . "\n";
        return ExitCode::OK;
    }
}
