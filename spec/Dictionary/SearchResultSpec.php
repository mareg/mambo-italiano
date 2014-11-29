<?php

namespace spec\Dictionary;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Dictionary\Word;
use Dictionary\Translation;

class SearchResultSpec extends ObjectBehavior
{
    function let()
    {
        $word = new Word('ciao');
        $translations = [
            new Translation($word, new Word('hello'))
        ];

        $this->beConstructedWith($word, $translations);
    }

    function it_can_tell_if_it_is_for_word()
    {
        $this->isForWord(new Word('ciao'))->shouldReturn(true);
        $this->isForWord(new Word('bello'))->shouldReturn(false);
    }

    function it_can_tell_if_it_has_a_translation()
    {
        $this->hasTranslation(new Translation(new Word('ciao'), new Word('hello')))->shouldReturn(true);
        $this->hasTranslation(new Translation(new Word('ciao'), new Word('goodbye')))->shouldReturn(false);
    }
}
