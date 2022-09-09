<?php
 namespace src;

 class Task8
 {
     static function getProperties($key,$obj,&$result): void
     {
         if (is_object($obj))
         {
            $properties=get_mangled_object_vars($obj);
            foreach ($properties as $key=>$value)
            {
                if (is_object($value))
                {
                    self::getProperties($key,$value,$result);
                }
                else
                {
                    if (strlen($result)!=0)
                    {
                        $result.="<br>";
                    }
                    $result.=$key . " " . $value;
                }
            }
         }
     }

     static function check($json) :?string
     {
         $result="";
         if (json_decode($json)==null)
         {
             throw new \InvalidArgumentException("Введённые данные должны быть стокой формата json");
         }
         else
         {
             $obj=json_decode($json);
             Task8::getProperties(get_mangled_object_vars($obj),$obj,$result);
         }
         return $result;
     }

     static function main($json) : ?string
     {
         $result=null;
         try
         {
             $result=Task8::check($json);
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

 $string='{
"Title": "The Cuckoos Calling",
"Author": "Robert Galbraith",
"Detail": {
"Publisher": "Little Brown"
}
}
';

 $task=Task8::main($string);
 echo $task;