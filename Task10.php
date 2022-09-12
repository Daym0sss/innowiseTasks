<?php

namespace src;

class Task10
{
    public function check(int $num): array
    {
        $result = [];
        if (is_int($num)) {
            array_push($result, $num);
            while ($num != 1) {
                if ($num % 2 == 0) {
                    $num = $num / 2;
                } else {
                    $num = $num * 3 + 1;
                }
                array_push($result, $num);
            }

            return $result;
        } else {
            throw new \InvalidArgumentException('Введённое значение должно быть целым числом');
        }
    }

    public function main(int $num): array
    {
        $result = null;

        try {
            $result = $this->check($num);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
