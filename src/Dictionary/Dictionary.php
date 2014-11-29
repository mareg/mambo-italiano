<?php

namespace Dictionary;

class Dictionary
{
    private $translations = [];

    public function hasBeenAdded(Word $word)
    {
        return false;
    }

    public function addTranslation(Translation $translation)
    {
        $this->translations[] = $translation;
    }

    public function searchForWord(Word $word)
    {
        return new SearchResult($word, [$this->translations[0]]);
    }
}
