<?php

namespace src;

class Parser
{
    private $dao;
    private $xml;

    /**
     * Parser constructor.
     */
    public function __construct()
    {
        $this->dao = \dao\DaoFactory::getFactory()->getDaoProductImpl();
        try {
            $this->xml = simplexml_load_file('../xmlForParse.xml');
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * The function parse .xml file
     */
    public function parseXml()
    {
        foreach ($this->xml->xpath('/price/product') as $product) {

            /**
             * ******************************* Convert character encoding to UTF-8 **********************************************
             */

//            $category = $this->getAttribute(mb_convert_encoding($product['Категория']->asXML(), 'utf-8', 'cp-1251'));
//            $code_category = $this->getAttribute(mb_convert_encoding($product['КодКатегории']->asXML(), 'utf-8', 'cp-1251'));
//            $article = $this->getAttribute(mb_convert_encoding($product['Артикул']->asXML(), 'utf-8', 'cp-1251'));
//            $code = $this->getAttribute(mb_convert_encoding($product['Код']->asXML(), 'utf-8', 'cp-1251'));
//            $name = $this->getAttribute(mb_convert_encoding($product['Наименование']->asXML(), 'utf-8', 'cp-1251'));
//            $basic_measure = $this->getAttribute(mb_convert_encoding($product['БазоваяЕдиницаИзмерения']->asXML(), 'utf-8', 'cp-1251'));
//            $cost = $this->getAttribute(mb_convert_encoding($product['Цена']->asXML(), 'utf-8', 'cp-1251'));
//            $currency = $this->getAttribute(mb_convert_encoding($product['Валюта']->asXML(), 'utf-8', 'cp-1251'));
//            $measure = $this->getAttribute(mb_convert_encoding($product['ЕдиницаИзмерения']->asXML(), 'utf-8', 'cp-1251'));

            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


            /**
             * ******************************** Parse xml attributes without character encoding *********************************
             */

            $category = $this->getAttribute($product['Категория']->asXML());
            $code_category = $this->getAttribute($product['КодКатегории']->asXML());
            $article = $this->getAttribute($product['Артикул']->asXML());
            $code = $this->getAttribute($product['Код']->asXML());
            $name = $this->getAttribute($product['Наименование']->asXML());
            $basic_measure = $this->getAttribute($product['БазоваяЕдиницаИзмерения']->asXML());
            $cost = $this->getAttribute($product['Цена']->asXML());
            $currency = $this->getAttribute($product['Валюта']->asXML());
            $measure = $this->getAttribute($product['ЕдиницаИзмерения']->asXML());

            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $attributes = array(
                'Category' => $category,
                'Code_category' => $code_category,
                'Article' => $article,
                'Code' => $code,
                'Name' => $name,
                'Basic_measure' => $basic_measure,
                'Cost' => $cost,
                'Currency' => $currency,
                'Measure' => $measure
            );

            $this->dao->createProduct($attributes);
        }
    }

    /**
     * The function return substring from attribute
     *
     * @param $attribute
     * @return string
     */
    private function getAttribute($attribute)
    {
        $start_pos = strpos($attribute, '"') + 1;
        $finish_pos = strrpos($attribute, '"');
        $attr_length = $finish_pos - $start_pos;

        return substr($attribute, $start_pos, $attr_length);
    }
}