<?php

namespace app\commands;

use app\enums\InterfaceTypeEnum;
use app\interfaces\RequestLoggerInterface;
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

	/**
	 * @var RequestLoggerInterface
	 */
	protected $requestLogger;

	public function __construct(
		string $id,
		Module $module,
		TestTaskSolverInterface $testTaskSolver,
		RequestLoggerInterface $requestLogger,
		array $config = []
	)
	{
		$this->testTaskSolver = $testTaskSolver;
		$this->requestLogger = $requestLogger;

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

	    $this->requestLogger->save(
	    	InterfaceTypeEnum::CONSOLE, $N, $arr, $res, $userId
	    );

        echo $res . "\n";
        return ExitCode::OK;
    }
}
