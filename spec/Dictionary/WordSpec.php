<?php

namespace spec\Dictionary;

use PhpSpec\ObjectBehavior;

use Dictionary\Word;

class WordSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('ciao');
    }

    function it_returns_true_if_it_equals_another_word()
    {
        $this->equals(new Word('ciao'))->shouldReturn(true);
    }

    function it_returns_false_if_it_does_not_equal_another_word()
    {
        $this->equals(new Word('bello'))->shouldReturn(false);
    }

    function it_casts_to_string()
    {
        $this->__toString()->shouldReturn('ciao');
    }
}
