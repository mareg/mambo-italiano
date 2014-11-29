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
        $results = [];
        foreach ($this->translations as $translation) {
            if ($translation->isForWord($word)) {
                $results[] = $translation;
            }
        }

        return new SearchResult($word, $results);
    }
}
