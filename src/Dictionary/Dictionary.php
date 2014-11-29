<?php

namespace Dictionary;

class Dictionary
{
    /**
     * @var Translation[]
     */
    private $translations = [];

    /**
     * @param Word $word
     *
     * @return boolean
     */
    public function hasBeenAdded(Word $word)
    {
        return false;
    }

    /**
     * @param Translation $translation
     */
    public function addTranslation(Translation $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * @param Word $word
     *
     * @return SearchResult
     */
    public function searchForWord(Word $word)
    {
        return new SearchResult($word, [$this->translations[0]]);
    }
}
