<?php namespace bzdbbb\Event\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * Code Editor
 * Renders a code editor field.
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class MapPicker extends FormWidgetBase
{
    /**
     * {@inheritDoc}
     */
    public $defaultAlias = 'mappicker';

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->lat = $this->getConfig('lat', '');  
        $this->lng = $this->getConfig('lng', '');  
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->vars['lat'] = $this->lat;
        $this->vars['lng'] = $this->lng;

        $lat_value = $this->model->{$this->lat};
        $this->vars['lat_value'] = $lat_value ?: '51';

        $lng_value = $this->model->{$this->lng};
        $this->vars['lng_value'] = $lng_value ?: '-0.6';
      
        return $this->makePartial('mappicker');
    }

    public function loadAssets()
    {
        $this->addCss('vendor/leaflet/leaflet.css');
        $this->addCss('css/mappicker.css');
        $this->addJs('vendor/leaflet/leaflet.js');
    }

    /**
     * {@inheritDoc}
     */
    public function getSaveData($value)
    {
        return strlen($value) ? $value : null;
    }
}