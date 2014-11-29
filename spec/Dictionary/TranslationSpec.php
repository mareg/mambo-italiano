<?php

namespace spec\Dictionary;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Dictionary\Word;
use Dictionary\Translation;

class TranslationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Dictionary\Translation');
    }

    function let()
    {
        $this->beConstructedWith(new Word('ciao'), new Word('hello'));
    }

    function it_is_equal_to_another_translation_if_word_and_translation_equal()
    {
        $this->equals(new Translation(new Word('ciao'), new Word('hello')))->shouldBe(true);
    }

    function it_is_not_equal_to_another_translation_if_translations_are_different()
    {
        $this->equals(new Translation(new Word('ciao'), new Word('goodbye')))->shouldBe(false);
    }

    function it_is_not_equal_to_another_translation_if_origin_word_are_different_but_translation_words_are_the_same()
    {
        $this->equals(new Translation(new Word('boungiorno'), new Word('hello')))->shouldBe(false);
    }
}
