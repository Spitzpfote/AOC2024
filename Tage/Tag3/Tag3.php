<?php

namespace Tag3;
class Tag3
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