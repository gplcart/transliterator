<?php

/**
 * @package Transliterator
 * @author Iurii Makukh
 * @copyright Copyright (c) 2017, Iurii Makukh
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\transliterator;

use gplcart\core\Module;

/**
 * Main class for Transliterator module
 */
class Transliterator extends Module
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Implements hook "language.translit"
     * @param string $string
     * @param string $language
     * @param string|null $translit
     */
    public function hookLanguageTranslit($string, $language, &$translit)
    {
        $translit = $this->transliterate($string, $language);
    }

    /**
     * Transliterate a string
     * @param string $string
     * @param string|null $language
     */
    public function transliterate($string, $language = null)
    {
        if (empty($language)) {
            $language = null;
        }

        /* @var $transliterator \gplcart\modules\transliterator\helpers\Transliterator */
        $transliterator = $this->getInstance('gplcart\\modules\\transliterator\\helpers\\Transliterator');
        return $transliterator->transliterate($string, '?', $language);
    }

}
