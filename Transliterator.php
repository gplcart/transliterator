<?php

/**
 * @package Transliterator
 * @author Iurii Makukh
 * @copyright Copyright (c) 2017, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\transliterator;

use gplcart\core\Container;

/**
 * Main class for Transliterator module
 */
class Transliterator
{

    /**
     * Implements hook "language.translit.before"
     * @param string $string
     * @param string $language
     * @param string|null $result
     */
    public function hookLanguageTranslitBefore($string, $language, &$result)
    {
        $result = $this->transliterate($string, $language);
    }

    /**
     * Transliterate a string
     * @param string $string
     * @param string|null $language
     * @return string
     */
    public function transliterate($string, $language = null)
    {
        if (empty($language)) {
            $language = null;
        }

        return $this->getTransliterator()->transliterate($string, '?', $language);
    }

    /**
     * Returns transliterator class instance
     * @return \gplcart\modules\transliterator\helpers\Transliterator
     */
    protected function getTransliterator()
    {
        return Container::get('gplcart\\modules\\transliterator\\helpers\\Transliterator');
    }

}
