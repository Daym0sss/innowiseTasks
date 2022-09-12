<?php
namespace src;

class Task9
{
    static function check($arr,$n) : ?array
    {
        $result=array();
        if (!is_array($arr) or count($arr)==0)
        {
            throw new \InvalidArgumentException("Первый параметр должен быть массивом ненулевой длины");
        }
        else if (count($arr)<3)
        {
            throw new \InvalidArgumentException("Первый параметр должен быть массивом длины от 3 и более");
        }
        else
        {
            $i=0;
            while ($i<=count($arr)-3)
            {
                if ($arr[$i]+$arr[$i+1]+$arr[$i+2]==$n)
                {
                    array_push($result,$arr[$i] . ' + ' . $arr[$i+1] . ' + ' . $arr[$i+2] . ' = ' . $n);
                }
                $i++;
            }
            return $result;
        }
    }

    static function main($arr,$n) : ?array
    {
        $result=null;
        try
        {
            $result=Task9::check($arr,$n);
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
