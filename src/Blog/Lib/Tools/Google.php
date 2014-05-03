<?php
namespace Blog\Lib\Tools;

class Google extends \Blog\Lib\Tools\Tool
{

    /**
     * This method will return script required for all (or at least majority) tools from facebook
     *
     * @param $options Additional
     *            for initialization
     *            
     * @return String with javascript code
     */
    public function base($options)
    {
        if ($this->requiresAdding('base'))
        {
            $this->setAdded('base');
            return '<script type="text/javascript">(function() { var po = document.createElement("script"); po.type = "text/javascript"; po.async = true; po.src = "https://apis.google.com/js/platform.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s); })();</script>';
        }
        return null;
    }

    /**
     * Returns script required to register a social tool
     *
     * @param $options Additional            
     *
     * @return Script required to register tool
     */
    public function plus($options)
    {
        $result = '';
        if ($this->requiresAdding('base'))
        {
            $result = $this->base($options);
        }
        
        $attributes = array(
            'data-size' => $this->getOptionsValue($options, 'lang', 'social.google.plus.size'),
            'data-annotation' => $this->getOptionsValue($options, 'via', 'social.google.plus.annotation'),
        );

        $result .= '<div class="g-plusone"' . $this->convertArrayToAttributes($attributes) . '></div>';
        
        return $result;
    }

    /**
     * This method returnd array of supported tools
     */
    public function getSupported()
    {
        return array(
            'plus'
        );
    }
}