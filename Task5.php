<?php
    namespace src;

    class Task5
    {
        static function bitwiseAdd($a,$b,$first,$second): ?string
        {
             $result="";
             $i=0;
             $carry=0;
             $firstLength=strlen($first);
             $secondLength=strlen($second);
             $aLength=strlen($a);
             $bLength=strlen($b);
             while($i<$firstLength)
             {
                 $result.=($a[$aLength-$i-1]+$b[$bLength-$i-1]+$carry)%10;
                 if (($a[$aLength-$i-1]+$b[$bLength-$i-1]+$carry)>=10)
                 {
                     $carry=($a[$aLength-$i-1]+$b[$bLength-$i-1]+$carry-($a[$aLength-$i-1]+$b[$bLength-$i-1]+$carry)%10)/10;
                 }
                 else
                 {
                     $carry=0;
                 }
                 $i++;
             }
            if ($carry==0)
            {
                while ($i<$secondLength)
                {
                    $result.=$second[$secondLength-$i-1];
                    $i++;
                }
            }
            if ($carry!=0)
            {
                while($carry!=0 and $i<$secondLength)
                {
                    $result.=($second[$secondLength-$i-1]+$carry)%10;
                    if (($second[$secondLength-$i-1]+$carry)>=10)
                    {
                        $carry=($second[$secondLength-$i-1]+$carry-($second[$secondLength-$i-1]+$carry)%10)/10;
                    }
                    else
                    {
                        $carry=0;
                    }
                    $i++;
                }
            }
            if ($i==$secondLength)
            {
                if ($carry!=0)
                {
                    return strrev($result . $carry);
                }
                else return strrev($result);
            }
            else
            {
                return strrev($result);
            }
        }

        static function add($a,$b): ?string
        {
           if (strlen($a)<strlen($b))
           {
               return self::bitwiseAdd($a,$b,$a,$b);
           }
           else
           {
               return self::bitwiseAdd($a,$b,$b,$a);
           }
        }

        static function fib($i): ?string
        {
            if ($i<=1)
            {
                return $i;
            }
            else
            {
                return Task5::add(self::fib($i-1),self::fib($i-2));
            }
        }

        static function count($n): ?string
        {
            $result="";
            $i=0;
            while(strlen($result)<$n)
            {
                $result=Task5::fib($i);
                $i++;
            }
            return $result;
        }

        static function check($n): ?string
        {
            if (is_int($n))
            {
                if ($n<=0)
                {
                    throw new \InvalidArgumentException("Должно быть введено целое число большее 1");
                }
                else
                {
                    return Task5::count($n);
                }
            }
            else
            {
                throw new \InvalidArgumentException("Должно быть введено целое число");
            }
        }

        static function main($n): ?string
        {
            $result=null;
            try
            {
                $result=Task5::check($n);
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

    $task=Task5::fib(60);
    echo $task;
