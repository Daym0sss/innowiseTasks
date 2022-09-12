<?php

namespace src;

class Task4
{
    public function check(string $string): string
    {
        $error = false;
        $i = 0;
        while ($i < strlen($string) and !$error) {
            if (!ctype_alpha($string[$i])) {
                if ($string[$i] != '_' and $string[$i] != '-' and $string[$i] != ' ') {
                    $error = true;
                }
            }
            $i++;
        }
        if (!$error) {
            $i = 0;
            $result = '';
            while ($i < strlen($string)) {
                if ($string[$i] == ' ' or $string[$i] == '_' or $string[$i] == '-') {
                    $i++;
                } else {
                    $result .= strtoupper($string[$i]);
                    $i++;
                    while ($i < strlen($string) and $string[$i] != ' ' and $string[$i] != '_' and $string[$i] != '-') {
                        $result .= $string[$i];
                        $i++;
                    }
                }
            }

            return $result;
        } else {
            throw new \InvalidArgumentException('Выброшено исключение: введённая строка должна содержать только символы A-Z a-z, символы _ и - и пробелы');
        }
    }

    public function main(string $string): string
    {
        $result = null;

        try {
            $result = $this->check($string);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
