<?php
namespace src;

class Task4
{
    static function check($string) : ?string
    {
        $error=false;
        $i=0;
        while ($i<strlen($string) and !$error)
        {
            if (!ctype_alpha($string[$i]))
            {
                if ($string[$i] != '_' and $string[$i] != '-' and $string[$i] != ' ')
                {
                    $error = true;
                }
            }
            $i++;
        }
        if (!$error)
        {
            $i=0;
            $result="";
            while ($i<strlen($string))
            {
                if ($string[$i]==' ' or $string[$i]=='_' or $string[$i]=='-')
                {
                    $i++;
                }
                else
                {
                    $result.=strtoupper($string[$i]);
                    $i++;
                    while($i<strlen($string) and $string[$i]!=' ' and $string[$i]!='_' and $string[$i]!='-')
                    {
                        $result.=$string[$i];
                        $i++;
                    }
                }
            }
            return $result;
        }
        else
        {
            throw new \InvalidArgumentException('Выброшено исключение: введённая строка должна содержать только символы A-Z a-z, символы _ и - и пробелы');
        }
    }

    static function main($string) : ?string
    {
        $result=null;
        try
        {
            $result=Task4::check($string);
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

$task=Task4::main("The quick-brown_fox jumps over the_lazy-dog");
echo $task;
?>
