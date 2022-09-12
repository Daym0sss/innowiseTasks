<?php

namespace src;

class Task12
{
    private float $a;
    private float $b;
    private float $result;

    public function check(float $a, float $b): void
    {
        if (is_int($a) or is_float($a)) {
            if (is_int($b) or is_float($b)) {
                $this->a = $a;
                $this->b = $b;
            } else {
                throw new \InvalidArgumentException('Введённые значения должны быть целыми или дробными числами');
            }
        } else {
            throw new \InvalidArgumentException('Введённые значения должны быть целыми или дробными числами');
        }
    }

    public function __construct(float $a, float $b)
    {
        try {
            $this->check($a, $b);
            $this->result = 0;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function add(): object
    {
        $this->result = $this->a + $this->b;

        return $this;
    }

    public function addBy(float $num): object
    {
        $this->result += $num;

        return $this;
    }

    public function subtract(): object
    {
        $this->result = $this->a - $this->b;

        return $this;
    }

    public function subtractBy(float $num): object
    {
        $this->result -= $num;

        return $this;
    }

    public function multiply(): object
    {
        $this->result = $this->a * $this->b;

        return $this;
    }

    public function multiplyBy(float $num): object
    {
        $this->result *= $num;

        return $this;
    }

    public function count(float $num): float
    {
        if ($num == 0) {
            throw new \InvalidArgumentException('<br>Попытка деления привела к ошибке - делитель не может быть равен 0<br>Результат последней безошибочной операции: ');
        } else {
            return $this->a / $this->b;
        }
    }

    public function divide(): object
    {
        try {
            $this->result = $this->count($this->b);
        } catch(\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $this;
        }
    }

    public function divideBy(float $num): object
    {
        try {
            $this->result = $this->count($num);
        } catch(\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $this;
        }
    }

    public function __toString(): string
    {
        if ($this == null) {
            return 'Ошибка вычисления';
        } else {
            return $this->result;
        }
    }
}
