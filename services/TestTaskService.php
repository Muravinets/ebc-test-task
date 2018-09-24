<?php

namespace app\services;

use app\interfaces\TestTaskSolverInterface;

/**
 * Class TestTaskService
 *
 * Implements solving of the Test Task described in the TestTaskSolverInterface
 *
 * @package app\services
 */
class TestTaskService implements TestTaskSolverInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function process(int $n, array $arr): int
    {
        if (count($arr) < 2) {
            return -1;
        }

        $l = 0;
        $r = count($arr);
        $dir = true; // Флаг направления: true - слева направо, false - справа налево

        $pos = $l;
        do {
            if (($arr[$pos] === $n) === $dir) {
                $dir = !$dir;
            }

            // В зависимости от направления смещаемся на встречу
            $pos = $dir ? ++$l : --$r;
        } while ($l !== $r);

        if ($dir && $r !== count($arr)) {
            return $l;
        }

        return -1;
    }
}
