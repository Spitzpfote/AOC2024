<?php

namespace Tag4;
class Tag4
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
        $counter = 0;
        $vertical_order = [];
        $multi_Array = $data;
        foreach($data as $key=>$row){
            $find_horizontal = [];
            preg_match_all('/XMAS/', $row, $find_horizontal);
            if (count($find_horizontal[0]) > 0){
                $counter += count($find_horizontal[0]);
            }
            preg_match_all('/SAMX/', $row, $find_horizontal);
            if (count($find_horizontal[0]) > 0){
                $counter += count($find_horizontal[0]);
            }
            $zeichen = str_split($row);
            foreach($zeichen as $key2=>$z){
                $vertical_order[$key2] = $vertical_order[$key2].$z;
            }
            $multi_Array[$key] = $zeichen;
        }

        foreach($vertical_order as $vrow){
            $find_horizontal = [];
            preg_match_all('/XMAS/', $vrow, $find_horizontal);
            if (count($find_horizontal[0]) > 0){
                $counter += count($find_horizontal[0]);
            }
            preg_match_all('/SAMX/', $vrow, $find_horizontal);
            if (count($find_horizontal[0]) > 0){
                $counter += count($find_horizontal[0]);
            }
        }

        foreach($multi_Array as $rowNumber => $row){
            foreach($row as $charKey=>$value){
                if($value === 'X'){

                    if($multi_Array[$rowNumber+1][$charKey+1] === 'M'){ //oben nach unten rechts
                        if($multi_Array[$rowNumber+2][$charKey+2] === 'A'){
                            if($multi_Array[$rowNumber+3][$charKey+3] === 'S'){
                                $counter++;
                            }
                        }
                    }
                    if($multi_Array[$rowNumber+1][$charKey-1] === 'M'){ //oben nach unten links
                        if($multi_Array[$rowNumber+2][$charKey-2] === 'A'){
                            if($multi_Array[$rowNumber+3][$charKey-3] === 'S'){
                                $counter++;
                            }
                        }
                    }
                } else if($value === 'S'){
                    if($multi_Array[$rowNumber+1][$charKey+1] === 'A'){ //oben nach unten rechts
                        if($multi_Array[$rowNumber+2][$charKey+2] === 'M'){
                            if($multi_Array[$rowNumber+3][$charKey+3] === 'X'){
                                $counter++;
                            }
                        }
                    }
                    if($multi_Array[$rowNumber+1][$charKey-1] === 'A'){ //oben nach unten links
                        if($multi_Array[$rowNumber+2][$charKey-2] === 'M'){
                            if($multi_Array[$rowNumber+3][$charKey-3] === 'X'){
                                $counter++;
                            }
                        }
                    }
                }
            }
        }
        return $counter;
    }

    public function TeilB()
    {
        $data = $this->importData();
        $counter = 0;
        $multi_Array = $data;
        foreach($data as $key=>$row){
            $zeichen = str_split($row);
            $multi_Array[$key] = $zeichen;
        }

        foreach($multi_Array as $rowNumber => $row){
            foreach($row as $charKey=>$value){
                if($value === 'M'){
                    if($multi_Array[$rowNumber+1][$charKey+1] === 'A'){ //oben rechts unten
                        if($multi_Array[$rowNumber+2][$charKey+2] === 'S'){
                            $counter += $this->findOppositeOfX($row, $charKey, $multi_Array, $rowNumber);
                        }
                    }

                } else if($value === 'S'){
                    if($multi_Array[$rowNumber+1][$charKey+1] === 'A'){ //oben links unten
                        if($multi_Array[$rowNumber+2][$charKey+2] === 'M'){
                            $counter += $this->findOppositeOfX($row, $charKey, $multi_Array, $rowNumber);
                        }
                    }
                }
            }
        }

        return $counter;
    }

    public function findOppositeOfX($row, $charKey, $multi_Array, $rowNumber)
    {
        if($multi_Array[$rowNumber][$charKey+2] === 'M'){
            if($multi_Array[$rowNumber+1][$charKey+1] === 'A'){ //oben links unten
                if($multi_Array[$rowNumber+2][$charKey] === 'S'){
                    return 1;
                }
            }
        } else if($multi_Array[$rowNumber][$charKey+2] === 'S'){
            if($multi_Array[$rowNumber+1][$charKey+1] === 'A'){ //oben links unten
                if($multi_Array[$rowNumber+2][$charKey] === 'M'){
                    return 1;
                }
            }
        }
        return 0;
    }

    public function showContent()
    {
//        $teilA = $this->TeilA();
        $teilB = $this->TeilB();

        echo $teilB;
    }
}