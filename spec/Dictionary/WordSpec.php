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

    function it_can_tell_if_it_equals_to_another_word()
    {
        $this->equals(new Word('ciao'))->shouldReturn(true);
        $this->equals(new Word('bello'))->shouldReturn(false);
    }

    function it_casts_to_string()
    {
        $this->__toString()->shouldReturn('ciao');
    }
}
