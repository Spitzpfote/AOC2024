<?php

namespace Tag2;
class Tag2
{
    public function importData()
    {
        $fileData = file('./input', FILE_IGNORE_NEW_LINES);

        if (!is_array($fileData)) {
            return [];
        }

        return $fileData;
    }

    public function difference($number1, $number2){
        $diff = $number1-$number2;
        if ($diff === 1 || $diff === 2 || $diff === 3){
            return 'positiv';
        } else if($diff === -1 || $diff === -2 || $diff === -3){
            return 'negativ';
        } else {
            return 'inkorrekt';
        }
    }

    public function posNeg($diff){
        if ($diff === 1 || $diff === 2 || $diff === 3){
            return 'positiv';
        } else if($diff === -1 || $diff === -2 || $diff === -3){
            return 'negativ';
        } else {
            return 'inkorrekt';
        }
    }

    public function difference2($numbers, $key, $before){
        $diff = $numbers[$key]-$numbers[$key+1];
        $diff2 = 0;

        if(isset($numbers[$key+2])){
            $diff2 = $numbers[$key]-$numbers[$key+2];
        }


        if($before !== '' || $this->posNeg($diff) !== $before){
            if(isset($numbers[$key+2])) {
                $nextValue = $this->posNeg($diff2);
                if($nextValue === $before){
                    return $nextValue;
                }
            }
            return 'inkorrekt';
        }
        return $diff;
    }

    public function TeilA()
    {
        $data = $this->importData();
        $safe = 0;
        foreach($data as $row){
            $numbers = explode(' ', $row);
            $result = [];

            foreach($numbers as $key=>$number){
                if(isset($numbers[$key+1])){
                    $result[] = $this->difference($number,$numbers[$key+1]);
                }
            }

            $results = array_unique($result);
            if(count($results) === 1){
                $safe++;
            }
        }

        return $safe;
    }

    public function TeilB()
    {
        $data = $this->importData();
        $safe = 0;
        foreach($data as $row){
            $numbers = explode(' ', $row);
            $result = [];

            foreach($numbers as $key=>$number){
                if(isset($numbers[$key+1])){
                    $result[$key] = $this->difference($number,$numbers[$key+1]);
                }
            }

            $results = array_unique($result);
            if(count($results) !== 1){
                var_dump($result);
            }else{
                $safe++;
            }


        }

        echo '   |   ';
        return $safe;
    }

    public function showContent()
    {
        $teilA = $this->TeilA();
        $teilB = $this->TeilB();

        echo $teilB;
    }
}