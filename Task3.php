<?php

namespace src;

class Task3
{
    public function check($number): int
    {
        if (is_int($number)) {
            if ($number > 0) {
                while (strlen($number) > 1) {
                    $digits = str_split($number);
                    $number = 0;
                    foreach ($digits as $digit) {
                        $number += $digit;
                    }
                }

                return $number;
            } else {
                throw new \InvalidArgumentException('Выброшено исключение: введённое значение должно быть целым положитенльным числом');
            }
        } else {
            throw new \InvalidArgumentException('Выброшено исключение: введённое значение должно быть целым числом');
        }
    }

    public function main($number): int
    {
        $result = 0;

        try {
            $result = $this->check($number);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
