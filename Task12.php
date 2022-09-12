<?php
    namespace src;

    class Task12
    {
        private float $a;
        private float $b;
        private float $result;

        public function check($a,$b): void
        {
            if (is_int($a) or is_float($a))
            {
                if (is_int($b) or is_float($b))
                {
                    $this->a=$a;
                    $this->b=$b;
                }
                else
                {
                    throw new \InvalidArgumentException("Введённые значения должны быть целыми или дробными числами");
                }
            }
            else
            {
                throw new \InvalidArgumentException("Введённые значения должны быть целыми или дробными числами");
            }
        }

        public function __construct($a,$b)
        {
            try
            {
                $this->check($a,$b);
                $this->result=0;
            }
            catch (\Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function add(): object
        {
            $this->result=$this->a+$this->b;
            return $this;
        }

        public function addBy($num): object
        {
            $this->result+=$num;
            return $this;
        }

        public function subtract(): object
        {
            $this->result=$this->a-$this->b;
            return $this;
        }

        public function subtractBy($num): object
        {
            $this->result-=$num;
            return $this;
        }

        public function multiply(): object
        {
            $this->result=$this->a*$this->b;
            return $this;
        }

        public function multiplyBy($num): object
        {
            $this->result*=$num;
            return $this;
        }

        public function count($num): float
        {
            if ($num==0)
            {
                throw new \InvalidArgumentException("<br>Попытка деления привела к ошибке - делитель не может быть равен 0<br>Результат последней безошибочной операции: ");
            }
            else
            {
                return $this->a/$this->b;
            }
        }

        public function divide(): ?object
        {
            $result=null;
            try
            {
                $this->result=$this->count($this->b);
                $result=$this;
            }
            catch(\Exception $e)
            {
                echo $e->getMessage();
                $result=$this;
            }
            finally
            {
                return $result;
            }
        }

        public function divideBy($num): ?object
        {
            $result=null;
            try
            {
                $this->result=$this->count($num);
                $result=$this;
            }
            catch(\Exception $e)
            {
                echo $e->getMessage();
                $result=$this;
            }
            finally
            {
                return $result;
            }
        }

        public function __toString(): string
        {
            if ($this==null)
            {
                return "Ошибка вычисления";
            }
            else
            {
                return $this->result;
            }
        }
    }
