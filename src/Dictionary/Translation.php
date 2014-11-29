<?php

namespace Dictionary;

class Translation
{
    /**
     * @var Word
     */
    private $word;

    /**
     * @var Word
     */
    private $translation;

    /**
     * @param Word $word
     * @param Word $translation
     */
    public function __construct(Word $word, Word $translation)
    {
        $this->word = $word;
        $this->translation = $translation;
    }

    /**
     * @param Translation $translation
     *
     * @return boolean
     */
    public function equals(Translation $translation)
    {
        if ($this->word == $translation->word && $this->translation == $translation->translation) {
            return true;
        }

        return false;
    }
}
