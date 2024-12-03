<?php

namespace Tag7;
class Tag7
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
        return 'Tag7A';
    }

    public function TeilB()
    {
        $data = $this->importData();
        return 'Tag7B';
    }

    public function showContent()
    {
        $teilA = $this->TeilA();
        $teilB = $this->TeilB();

        echo $teilA;
    }
}