<?php
/**
 * This is an unicode normalizer validator for agavi.
 *
 * @license LGPL
 * @author TANAKA Koichi
 */
class AgaviI18nUnicodeNormalizerValidator extends AgaviValidator
{
    public function validate()
    {
        $originalValue = &$this->getData($this->getArgument());

        $normalizer = new I18N_UnicodeNormalizer();
        $value = $normalizer->normalize($originalValue, $this->getParameter('type', 'NFC'), $this->getParameter('encoding', 'UFT-16,UTF-8'));

        if($this->hasParameter('export')) {
            $this->export($value);
        } else {
            $originalValue = $value;
        }
        return true;
    }
}
?>