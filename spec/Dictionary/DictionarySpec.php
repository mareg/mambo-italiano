<?php

namespace spec\Dictionary;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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

    function it_can_have_translation_added()
    {
        $translation = new Translation(new Word('ciao'), new Word('hello'));

        $this->addTranslation($translation);
    }

    function it_returns_translation_when_search_for_word_is_executed()
    {
        $word = new Word('ciao');
        $translation = new Translation($word, new Word('hello'));

        $this->addTranslation($translation);

        $this->searchForWord($word)->shouldReturnAnInstanceOf(SearchResult::class);
    }
}
