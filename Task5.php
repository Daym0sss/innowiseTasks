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

    public function fib(int $i): string
    {
        if ($i <= 1) {
            return $i;
        } else {
            return $this->add($this->fib($i - 1), $this->fib($i - 2));
        }
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
                throw new \InvalidArgumentException('Должно быть введено целое число большее 1');
            } else {
                return $this->count($n);
            }
        } else {
            throw new \InvalidArgumentException('Должно быть введено целое число');
        }
    }

    public function main(int $n): string
    {
        $result = null;

        try {
            $result = $this->check($n);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
