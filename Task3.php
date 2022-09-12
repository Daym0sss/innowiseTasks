<?php

namespace src;

class Task3
{
    public function check(int $number): int
    {
        if (is_int($number)) {
            while (strlen($number) > 1) {
                $digits = str_split($number);
                $number = 0;
                foreach ($digits as $digit) {
                    $number += $digit;
                }
            }

            return $number;
        } else {
            throw new \InvalidArgumentException('Выброшено исключение: введённое значение должно быть целым числом');
        }
    }

    public function main(int $number): int
    {
        $result = null;

        try {
            $result = $this->check($number);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
