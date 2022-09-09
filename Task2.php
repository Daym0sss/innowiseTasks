<?php
namespace src;

class Task2
{
    static function countDays($date) : ?int
    {
        if (preg_match("/^(0[1-9]|[12][0-9]|3[01])[-](0[1-9]|1[012])[-](19|20)\d\d$/",$date))
        {
            $today=strtotime('now');
            $birthday=strtotime($date);
            $diff=round(($birthday-$today)/(3600*24),1);
            if ($diff<0)
            {
                return abs($diff);
            }
            else
            {
                return $diff+1;
            }
        }
        else
        {
            throw new \InvalidArgumentException('Выброшено исключение: введённое значение даты должно соответствовать формату DD-MM-YYYY');
        }
    }

    static function main($date): ?int
    {
        $result=null;
        try
        {
            $result=Task2::countDays($date);
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

$task=Task2::main("02-11-2010");
echo $task;