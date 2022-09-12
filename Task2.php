<?php

namespace src;

class Task2
{
    public function countDays(string $date): int
    {
        if (preg_match("/^(0[1-9]|[12][0-9]|3[01])[-](0[1-9]|1[012])[-](19|20)\d\d$/", $date)) {
            $today = strtotime('now');
            $birthday = strtotime($date);
            $diff = round(($birthday - $today) / (3600 * 24), 1);
            if ($diff < 0) {
                return abs($diff);
            } else {
                return $diff + 1;
            }
        } else {
            throw new \InvalidArgumentException('Выброшено исключение: введённое значение даты должно соответствовать формату DD-MM-YYYY');
        }
    }

    public function main(string $date): int
    {
        $result = null;

        try {
            $result = $this->countDays($date);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
