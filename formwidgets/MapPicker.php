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
        $this->hostmap = $this->getConfig('hostmap', false);  
        $this->bind = $this->getConfig('bind', 'latitude');  
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->vars['hostmap'] = $this->hostmap;
        $this->vars['name'] = $this->formField->getName();

        $value = $this->model->{$this->columnName};
        $this->vars['value'] = $value ?: '';

        $this->vars['bind'] = $this->bind;
        
        return $this->makePartial('mappicker');
    }

    /**
     * {@inheritDoc}
     */
    public function getSaveData($value)
    {
        return strlen($value) ? $value : null;
    }
}