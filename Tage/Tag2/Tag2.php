<?php

namespace Tag2;
class Tag2
{
    public function TeilA()
    {
        return 'TeilA';
    }

    public function TeilB()
    {
        return 'TeilB';
    }

    public function showContent()
    {
        $teilA = $this->TeilA();
        $teilB = $this->TeilB();

        echo $teilA;
    }
}