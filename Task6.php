<?php

namespace src;

class Task6
{
    public function check(int $year, int $lastYear, int $month, int $lastMonth, string $day = 'Monday'): int
    {
        $result = 0;
        if ($day != 'Monday') {
            throw new \InvalidArgumentException("Последний параметр является необязательным и должен быть равен 'Monday'");
        } else {
            if (!(is_int($month) and is_int($year) and is_int($lastMonth) and is_int($lastYear))) {
                throw new \InvalidArgumentException('Ввёденные дата и месяц должны быть целыми числами большими 0');
            } else {
                if ($month < 0 or $month > 12 or $lastMonth < 0 or $lastMonth > 12) {
                    throw new \InvalidArgumentException('Месяц должен быть числом от 1 до 12');
                } elseif ($year < 0 or $lastYear < 0) {
                    throw new \InvalidArgumentException('Год должен быть больше 0');
                } elseif (strtotime($year . '-' . $month . '-01') > strtotime($lastYear . '-' . $lastMonth . '-01')) {
                    throw new \InvalidArgumentException('Начальная дата должна быть раньше конечной');
                } else {
                    $startDate = \DateTime::createFromFormat('Y-m-d', $year . '-' . $month . '-01');
                    $endDate = \DateTime::createFromFormat('Y-m-d', $lastYear . '-' . $lastMonth . '-01');
                    $date = $startDate;
                    while ($date != $endDate) {
                        if (getdate($date->getTimestamp())['weekday'] == 'Monday') {
                            $result++;
                        }
                        $date->setTimestamp(strtotime('+1 MONTH', $date->getTimestamp()));
                    }
                }
            }
        }


        return $result;
    }

    public function main(int $year, int $lastYear, int $month, int $lastMonth, string $day = 'Monday'): int
    {
        $result = 0;

        try {
            $result = $this->check($year, $lastYear, $month, $lastMonth, $day);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
