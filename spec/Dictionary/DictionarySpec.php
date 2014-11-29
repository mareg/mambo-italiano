<?php

namespace spec\Dictionary;

use PhpSpec\ObjectBehavior;

use Dictionary\Word;
use Dictionary\Translation;
use Dictionary\SearchResult;

class DictionarySpec extends ObjectBehavior
{
    function it_can_tell_if_word_has_been_added()
    {
        $word = new Word('example');

        $this->shouldNotHaveBeenAdded($word);
    }

    function it_can_have_a_translation_added()
    {
        $translation = new Translation(new Word('ciao'), new Word('hello'));

        $this->addTranslation($translation);
    }

    function it_returns_a_translation_when_searched_for_word_with_one_translation()
    {
        $word = new Word('ciao');
        $translation = new Translation($word, new Word('hello'));

        $this->addTranslation($translation);

        $result = $this->searchForWord($word);

        $result->shouldBeAnInstanceOf(SearchResult::class);
        $result->shouldBeForWord($word);
        $result->getNumberOfTranslations()->shouldReturn(1);
        $result->shouldHaveTranslation($translation);
    }

    function it_returns_multiple_translations_when_searched_for_word_with_multiple_translations()
    {
        $word = new Word('ciao');
        $translation1 = new Translation($word, new Word('hello'));
        $translation2 = new Translation($word, new Word('goodbye'));

        $this->addTranslation($translation1);
        $this->addTranslation($translation2);

        $result = $this->searchForWord($word);

        $result->shouldBeAnInstanceOf(SearchResult::class);
        $result->shouldBeForWord($word);
        $result->getNumberOfTranslations()->shouldReturn(2);
        $result->shouldHaveTranslation($translation1);
        $result->shouldHaveTranslation($translation2);        
    }
}
