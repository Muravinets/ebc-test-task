<?php

namespace app\services;

class TestTaskService
{
    public function process(int $n, array $arr): int
    {
        if (count($arr) < 2) {
            return -1;
        }

        $l = 0;
        $r = count($arr);
        $dir = true;

        $pos = $l;
        do {
            if (($arr[$pos] === $n) === $dir) {
                $dir = !$dir;
            }

            $pos = $dir ? ++$l : --$r;
        } while ($l !== $r);

        if ($dir && $r !== count($arr)) {
            return $l;
        }

        return -1;
    }
}
