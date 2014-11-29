<?php

namespace Dictionary;

class SearchResult
{
    /**
     * @var Word
     */
    private $word;

    /**
     * @var Translation[]
     */
    private $translations;

    /**
     * @param Word          $word
     * @param Translation[] $translations
     */
    public function __construct(Word $word, array $translations = [])
    {
        $this->word = $word;
        $this->translations = $translations;
    }

    /**
     * @param Word $word
     *
     * @return boolean
     */
    public function isForWord(Word $word)
    {
        return $word->equals($this->word);
    }

    /**
     * @param Translation $translation
     *
     * @return boolean
     */
    public function hasTranslation(Translation $translation)
    {
        foreach ($this->translations as $item) {
            if ($item->equals($translation)) {
                return true;
            }
        }

        return false;
    }
}
