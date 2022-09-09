<?php
 namespace src;
 use Cassandra\Date;

 class Task6
 {
     static function check($month,$year,$lastMonth,$lastYear): ?int
     {
         $result=0;
         $new=new \DateTime();
         if (!(is_int($month) and is_int($year) and is_int($lastMonth) and is_int($lastYear)))
         {
             throw new \InvalidArgumentException("Ввёденные дата и месяц должны быть целыми числами большими 0");
         }
         else
         {
             if ($month<0 or $month>12 or $lastMonth<0 or $lastMonth>12)
             {
                 throw new \InvalidArgumentException("Месяц должен быть числом от 1 до 12");
             }
             else if ($year<0)
             {
                     throw new \InvalidArgumentException("Год должен быть больше 0");
             }
             else if (strtotime($year . "-" . $month . "-01")>strtotime($lastYear . "-" . $lastMonth . "-01"))
             {
                 throw new \InvalidArgumentException("Начальная дата должна быть раньше конечной");
             }
             else
             {
                 $startDate=\DateTime::createFromFormat("Y-m-d",$year . "-" . $month . "-01");
                 $endDate=\DateTime::createFromFormat("Y-m-d",$lastYear . "-" . $lastMonth . "-01");
                 $date=$startDate;
                 while ($date!=$endDate)
                 {
                     if (getdate($date->getTimestamp())['weekday']=="Monday")
                     {
                         $result++;
                     }
                     $date->setTimestamp(strtotime('+1 MONTH',$date->getTimestamp()));
                 }
             }
         }
         return $result;
     }

     static function main($month,$year,$lastMonth,$lastYear): ?int
     {
         $result=null;
         try
         {
             $result=Task6::check($month,$year,$lastMonth,$lastYear);
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

 $task=Task6::main(2,2010,5,2020);
 echo $task;