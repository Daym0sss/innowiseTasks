<?php
namespace src;

    class Task1
    {
        public function check(int $number) : string
        {
            if (is_int($number))
            {
                return ($number>30) ? "More than 30" : (($number>20) ? "More than 20" : (($number>10) ? "More than 10" : "Equal or less than 10"));
            }
            else
            {
                throw new \InvalidArgumentException('Выброшено исключение: введённое значение должно быть целым числом');
            }
        }

        public function main(int $number) : string
        {
            $result=null;
            try
            {
                $result=$this->check($number);
            }
            catch (\Exception $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                return $result;
            }
        }
    }
