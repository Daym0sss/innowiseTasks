<?php
namespace src;

class Task10
{
    static function check($num) : ?array
    {
        $result=array();
        if (is_int($num))
        {
            array_push($result,$num);
            while($num!=1)
            {
                if ($num % 2==0)
                {
                    $num=$num/2;
                }
                else
                {
                    $num=$num*3+1;
                }
                array_push($result,$num);
            }
            return $result;
        }
        else
        {
            throw new \InvalidArgumentException("Введённое значение должно быть целым числом");
        }
    }

    static function main($num) : ?array
    {
        $result=null;
        try
        {
            $result=Task10::check($num);
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

$task=Task10::main(21);
echo '<pre>';
print_r($task);
echo '</pre>';