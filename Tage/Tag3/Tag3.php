<?php

namespace Tag3;
class Tag3
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
        $string = $data[0].$data[1].$data[2].$data[3].$data[4].$data[5];
        preg_match_all('/mul\(\d+,\d+\)/', $string, $matches);
        $summe = 0;
        foreach($matches[0] as $match){
            $parts = explode(',', $match);
            $part1 = str_replace("mul(", "", $parts[0]);
            $part2 = str_replace(")", "", $parts[1]);
            $summe += ($part1 * $part2);
        }
        return $summe;
    }

    public function TeilB()
    {
        $data = $this->importData();
        $string = $data[0].$data[1].$data[2].$data[3].$data[4].$data[5];
        preg_match_all('/mul\(\d+,\d+\)|don\'t\(\)|do\(\)/', $string, $matches);
//        preg_match_all('/mul\(\d+,\d+\)|don\'t\(\)|do\(\)/', "xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))", $matches);

        $summe = 0;
        $flag = true;
        foreach($matches[0] as $match){

            if($match === "don't()"){
                $flag = false;
            } else if($match === 'do()') {
                $flag = true;
            } else {
                if($flag === true){
                    $parts = explode(',', $match);
                    $part1 = str_replace("mul(", "", $parts[0]);
                    $part2 = str_replace(")", "", $parts[1]);
                    $summe += ($part1 * $part2);
                }
            }

        }
        return $summe;
    }

    public function showContent()
    {
        $teilA = $this->TeilA();
        $teilB = $this->TeilB();

        echo $teilB;
    }
}