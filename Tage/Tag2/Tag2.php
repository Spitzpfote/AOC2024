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

    public function TeilA()
    {
        $data = $this->importData();
        return 'TeilA';
    }

    public function TeilB()
    {
        $data = $this->importData();
        return 'TeilB';
    }

    public function showContent()
    {
        $teilA = $this->TeilA();
        $teilB = $this->TeilB();

        echo $teilA;
    }
}