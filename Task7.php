<?php

namespace src;

class Task7
{
    public function check(array $arr, int $n): array
    {
        if (!is_array($arr) or count($arr) == 0) {
            throw new \InvalidArgumentException('Первый параметр должен быть массивом ненулевой длины');
        } elseif ($n < 0 or $n >= count($arr)) {
            throw new \InvalidArgumentException('Второй параметр должен быть целым числом от 0 до (длина массива - 1)');
        } else {
            array_splice($arr, $n, 1);

            return $arr;
        }
    }

    public function main(array $arr, int $n): array
    {
        $result = null;

        try {
            $result = $this->check($arr, $n);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
