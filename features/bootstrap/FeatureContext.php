<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

use Dictionary\Word;
use Dictionary\Dictionary;
use Dictionary\Translation;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @var Dictionary
     */
    private $dictionary;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @BeforeScenario
     */
    public function spinUp()
    {
        $this->dictionary = new Dictionary();
    }

    /**
     * @Transform :word
     * @Transform :translation
     *
     * @param string $string
     *
     * @return Word
     */
    public function castStringToWord($string)
    {
        return new Word($string);
    }

    /**
     * @Transform :count
     *
     * @param string $string
     *
     * @return integer
     */
    public function castStringToInteger($string)
    {
        return (int)$string;
    }

    /**
     * @Given the word :word has not been added to the dictionary
     */
    public function theWordHasNotBeenAddedToTheDictionary(Word $word)
    {
        $this->dictionary = new Dictionary();

        expect($this->dictionary)->toNotHaveBeenAdded($word);
    }

    /**
     * @When I add the new word :word with a translation :translation
     */
    public function iAddTheNewWordWithATranslation(Word $word, Word $translation)
    {
        $this->dictionary->addTranslation(new Translation($word, $translation));
    }

    /**
     * @When I search for word :word in the dictionary
     */
    public function iSearchForWordInTheDictionary(Word $word)
    {
        $this->searchResult = $this->dictionary->searchForWord($word);
    }

    /**
     * @Then the search result for word :word should include translation :translation
     */
    public function theSearchResultForWordShouldIncludeTranslation(Word $word, Word $translation)
    {
        expect($this->searchResult)->toBeForWord($word);
        expect($this->searchResult)->toHaveTranslation(new Translation($word, $translation));
    }

    /**
     * @Given the word :word with translation :translation has been added to the dictionary
     */
    public function theWordWithTranslationHasBeenAddedToTheDictionary(Word $word, Word $translation)
    {
        $this->dictionary->addTranslation(new Translation($word, $translation));
    }

    /**
     * @Then I should see a notification that the word :word already exists in the dictionary
     */
    public function iShouldSeeANotificationThatTheWordAlreadyExistsInTheDictionary(Word $word)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see the word :word with :count translations in the dictionary
     */
    public function iShouldSeeTheWordWithTwoTranslationsInTheDictionary(Word $word, $count)
    {
        expect($this->searchResult)->toBeForWord($word);
        expect($this->searchResult->getNumberOfTranslations())->toBe($count);
    }
}
