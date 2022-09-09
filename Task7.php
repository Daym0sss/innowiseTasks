<?php
    namespace src;

    class Task7
    {
        static function check($arr,$n) : ?array
        {
            if (!is_array($arr) or count($arr)==0)
            {
                throw new \InvalidArgumentException("Первый параметр должен быть массивом ненулевой длины");
            }
            else if ($n<0 or $n>=count($arr))
            {
                throw new \InvalidArgumentException("Второй параметр должен быть целым числом от 0 до (длина массива - 1)");
            }
            else
            {
                array_splice($arr,$n,1);
                return $arr;
            }
        }

        static function main($arr,$n) : ?array
        {
            $result=null;
            try
            {
                $result=Task7::check($arr,$n);
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

    $arr=array();
    array_push($arr,1);
    array_push($arr,2);
    array_push($arr,3);
    array_push($arr,4);
    $n=1;
    $task=Task7::main($arr,$n);
    echo "<pre>";
    print_r($task);
    echo "</pre>";