<?php

use Illuminate\Support\Facades\App;
use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * Function to translate HTML content while preserving tags.
 *
 * @param string $html The HTML content to translate.
 * @param string $targetLang The target language code.
 * @return string The translated HTML content.
 */
function translateWithHTMLTags($html, $targetLang = null)
{
    // Determine the target language
    $targetLang = $targetLang ?? App::getLocale(); // Use the current application locale if not specified

    // Initialize the translator
    $translate = new GoogleTranslate($targetLang);

    // Use a regex to match all text outside of HTML tags
    $translatedHtml = preg_replace_callback(
        '/>([^<]+)</',
        function ($matches) use ($translate) {
            // Extract the text, translate it, and preserve spaces around it
            $text = $matches[1];
            $translatedText = $translate->translate(trim($text));
            return '>' . $translatedText . '<';
        },
        $html
    );

    return $translatedHtml;
}
