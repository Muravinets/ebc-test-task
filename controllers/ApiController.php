<?php

namespace app\controllers;

use app\enums\InterfaceTypeEnum;
use app\interfaces\RequestLoggerInterface;
use app\interfaces\TestTaskSolverInterface;
use app\models\User;
use yii\filters\auth\HttpBasicAuth;

class ApiController extends \yii\rest\Controller
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
		$id,
		$module,
		TestTaskSolverInterface $testTaskSolver,
		RequestLoggerInterface $requestLogger,
		array $config = [])
	{
		$this->testTaskSolver = $testTaskSolver;
		$this->requestLogger  = $requestLogger;

		parent::__construct($id, $module, $config);
	}

	public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
            'auth'  => function (string $username, string $password): ?User {
                return User::findOne(
                    [
                    'username' => $username,
                    'password' => $password]
                );
            },
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        $request = \Yii::$app->request;
		$params = json_decode($request->getRawBody());

        $N = $params->N;
        $arr = $params->arr;

        // Solve task
        $res = $this->testTaskSolver->process($N, $arr);

        // Log request
		$this->requestLogger->save(
			InterfaceTypeEnum::REST_API, $N, $arr, $res, \Yii::$app->user->id
		);

        return ['result' => $res];
    }
}
