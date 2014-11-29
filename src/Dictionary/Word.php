<?php

namespace Dictionary;

class Word
{
    /**
     * @var string
     */
    private $word;

    /**
     * @param string $word
     */
    public function __construct($word)
    {
        $this->word = $word;
    }

    /**
     * @param Word $word
     *
     * @return boolean
     */
    public function equals(Word $word)
    {
        return $this->word == $word->word;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->word;
    }
}
