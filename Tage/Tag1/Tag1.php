<?php

namespace Tag1;
class Tag1
{
    public function importData()
    {
        $fileData = file('./input', FILE_IGNORE_NEW_LINES);

        if (!is_array($fileData)) {
            return [];
        }

        return $fileData;
    }

    public function TeilA()
    {
        $data = $this->importData();
        $array_1 = [];
        $array_2 = [];
        foreach($data as $row){
            $strings = explode(' ', $row);
            $array_1[] = $strings[0];
            $array_2[] = $strings[3];
        }

        sort($array_1);
        sort($array_2);

        $summe = 0;

        foreach($array_1 as $key => $wert){
            $difference = abs($wert - $array_2[$key]);
            $summe += $difference;
        }

        return $summe;
    }

    public function TeilB()
    {
        $data = $this->importData();
        $array_1 = [];
        $array_2 = [];
        $summe = 0;
        foreach($data as $row){
            $strings = explode(' ', $row);
            $array_1[] = $strings[0];
            $array_2[] = $strings[3];
        }

        foreach($array_1 as $wert){
            $count = 0;
            foreach($array_2 as $number){
                if($number === $wert){
                    $count++;
                }
            }

            $result = $wert*$count;
            $summe += $result;
        }

        return $summe;
    }

    public function showContent()
    {
        $teilA = $this->TeilA();
        $teilB = $this->TeilB();

        var_dump($teilB);
    }
}