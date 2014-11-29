<?php

namespace Dictionary;

class Word
{
    private $word;

    public function __construct($word)
    {
        $this->word = $word;
    }

    public function equals(Word $word)
    {
        return $this->word == $word->word;
    }

    public function __toString()
    {
        return $this->word;
    }
}
