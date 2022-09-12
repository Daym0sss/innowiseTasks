<?php

namespace src;

class Task9
{
    public function check(array $arr, int $n): array
    {
        $result = [];
        if (!is_array($arr) or count($arr) == 0) {
            throw new \InvalidArgumentException('Первый параметр должен быть массивом ненулевой длины');
        } elseif (count($arr) < 3) {
            throw new \InvalidArgumentException('Первый параметр должен быть массивом длины от 3 и более');
        } elseif (!is_int($n)) {
            throw new \InvalidArgumentException('Второй параметр должен быть целым числом');
        } else {
            $i = 0;
            while ($i <= count($arr) - 3) {
                if ($arr[$i] + $arr[$i + 1] + $arr[$i + 2] == $n) {
                    array_push($result, $arr[$i] . ' + ' . $arr[$i + 1] . ' + ' . $arr[$i + 2] . ' = ' . $n);
                }
                $i++;
            }

            return $result;
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
