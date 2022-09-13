<?php

namespace src;

class Task8
{
    public function getProperties(object $obj, string &$result): void
    {
        if (is_object($obj)) {
            $properties = get_mangled_object_vars($obj);
            foreach ($properties as $key => $value) {
                if (is_object($value)) {
                    $this->getProperties($value, $result);
                } else {
                    if (strlen($result) != 0) {
                        $result .= '\r\n';
                    }
                    $result .= $key . ': ' . $value;
                }
            }
        }
    }

    public function check(string $json): string
    {
        $result = '';
        if (!is_object(json_decode($json))) {
            throw new \InvalidArgumentException('Введённые данные должны быть стокой формата json');
        } else {
            $obj = json_decode($json);
            $this->getProperties($obj, $result);
        }

        return $result;
    }

    public function main(string $json): string
    {
        $result = '';

        try {
            $result = $this->check($json);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            return $result;
        }
    }
}
