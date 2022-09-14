<?php

namespace src;

class Task5
{
    public function bitwiseAdd(string $a, string $b, string $first, string $second): string
    {
        $result = '';
        $i = 0;
        $carry = 0;
        $firstLength = strlen($first);
        $secondLength = strlen($second);
        $aLength = strlen($a);
        $bLength = strlen($b);
        while ($i < $firstLength) {
            $result .= ((int)$a[$aLength - $i - 1] + (int)$b[$bLength - $i - 1] + $carry) % 10;
            if (((int)$a[$aLength - $i - 1] + (int)$b[$bLength - $i - 1] + $carry) >= 10) {
                $carry = ((int)$a[$aLength - $i - 1] + (int)$b[$bLength - $i - 1] + $carry - ((int)$a[$aLength - $i - 1] + (int)$b[$bLength - $i - 1] + $carry) % 10) / 10;
            } else {
                $carry = 0;
            }
            $i++;
        }
        if ($carry == 0) {
            while ($i < $secondLength) {
                $result .= $second[$secondLength - $i - 1];
                $i++;
            }
        }
        if ($carry != 0) {
            while ($carry != 0 and $i < $secondLength) {
                $result .= ((int)$second[$secondLength - $i - 1] + $carry) % 10;
                if (((int)$second[$secondLength - $i - 1] + $carry) >= 10) {
                    $carry = ((int)$second[$secondLength - $i - 1] + $carry - ((int)$second[$secondLength - $i - 1] + $carry) % 10) / 10;
                } else {
                    $carry = 0;
                }
                $i++;
            }
        }
        if ($i == $secondLength) {
            if ($carry != 0) {
                return strrev($result . $carry);
            } else {
                return strrev($result);
            }
        } else {
            return strrev($result);
        }
    }

    public function add(string $a, string $b): string
    {
        if (strlen($a) < strlen($b)) {
            return $this->bitwiseAdd($a, $b, $a, $b);
        } else {
            return $this->bitwiseAdd($a, $b, $b, $a);
        }
    }

    public function fib(int $n): string
    {
        $prev = 0;
        $next = 1;
        for ($i = 0;$i < $n;$i++) {
            $temp = $next;
            $next = $this->add($prev, $next);
            $prev = $temp;
        }

        return $prev;
    }

    public function count(int $n): string
    {
        $result = '';
        $i = 0;
        while (strlen($result) < $n) {
            $result = $this->fib($i);
            $i++;
        }

        return $result;
    }

    public function check(int $n): string
    {
        if (is_int($n)) {
            if ($n <= 0) {
                throw new \InvalidArgumentException('Должно быть введено целое положительное число');
            } else {
                return $this->count($n);
            }
        } else {
            throw new \InvalidArgumentException('Должно быть введено целое число');
        }
    }

    public function main(int $n): string
    {
        $result = '';

        try {
            $result = $this->check($n);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
