<?php

namespace spec\Dictionary;

use PhpSpec\ObjectBehavior;

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

    function it_returns_true_if_is_for_word_ciao()
    {
        $this->isForWord(new Word('ciao'))->shouldReturn(true);
    }

    function it_returns_false_if_is_not_for_word_ciao()
    {
        $this->isForWord(new Word('bello'))->shouldReturn(false);
    }

    function it_returns_true_if_it_has_translation()
    {
        $this->hasTranslation(new Translation(new Word('ciao'), new Word('hello')))->shouldReturn(true);
    }

    function it_returns_false_if_it_does_not_have_translation()
    {
        $this->hasTranslation(new Translation(new Word('ciao'), new Word('goodbye')))->shouldReturn(false);
    }

    function it_returns_0_if_has_no_translations_of_given_word()
    {
        $word = new Word('ciao');

        $this->beConstructedWith($word, []);

        $this->getNumberOfTranslations()->shouldReturn(0);
    }

    function it_returns_1_for_1_translation_for_given_word()
    {
        $this->getNumberOfTranslations()->shouldReturn(1);
    }

    function it_returns_2_for_2_translations_for_given_word()
    {
        $word = new Word('ciao');
        $translations = [
            new Translation($word, new Word('hello')),
            new Translation($word, new Word('goodbye'))
        ];

        $this->beConstructedWith($word, $translations);

        $this->getNumberOfTranslations()->shouldReturn(2);
    }
}
