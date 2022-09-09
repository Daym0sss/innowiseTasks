<?php
namespace src;

class Task3
{
    static function check($number) : ?int
    {
        if (is_int($number))
        {
            while(strlen($number)>1)
            {
                $digits=str_split($number);
                $number=0;
                foreach ($digits as $digit)
                {
                    $number+=$digit;
                }
            }
            return $number;
        }
        else
        {
            throw new \InvalidArgumentException('Выброшено исключение: введённое значение должно быть целым числом');
        }
    }

    static function main($number) : ?int
    {
        $result=null;
        try
        {
            $result=Task3::check($number);
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

$task=Task3::main(5689);
echo $task;
