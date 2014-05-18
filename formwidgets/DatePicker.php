<?php namespace bzdbbb\Event\FormWidgets;

use Backend\Classes\FormWidgetBase;

/**
 * Code Editor
 * Renders a code editor field.
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class DatePicker extends FormWidgetBase
{
    /**
     * {@inheritDoc}
     */
    public $defaultAlias = 'datepicker';

    /**
     * @var bool Display mode: datetime, date, time.
     */
    public $mode = 'datetime';

    /**
     * @var string the minimum/earliest date that can be selected.
     */
    public $minDate = '2000-01-01';

    /**
     * @var string the maximum/latest date that can be selected.
     */
    public $maxDate = '2020-12-31';

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->mode = $this->getConfig('mode', $this->mode);
        $this->minDate = $this->getConfig('minDate', $this->minDate);
        $this->maxDate = $this->getConfig('maxDate', $this->maxDate);
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('datepicker');
    }

    /**
     * Prepares the list data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();

        $value = $this->model->{$this->columnName};

        if ($this->mode != 'datetime' && $value) {
            if (is_string($value))
                $value = substr($value, 0, 10);
            elseif (is_object($value))
                $value = $value->toDateString();
        }

        $this->vars['value'] = $value ?: '';
        $this->vars['showTime'] = $this->mode == 'datetime' || $this->mode == 'time';
        $this->vars['minDate'] = $this->minDate;
        $this->vars['maxDate'] = $this->maxDate;
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $this->addCss('vendor/pikaday/css/pikaday.css');
        $this->addCss('css/datepicker.css');
        $this->addJs('vendor/pikaday/js/pikaday.js');
        $this->addJs('vendor/pikaday/js/pikaday.jquery.js');
        $this->addJs('js/datepicker.js');
    }

    /**
     * {@inheritDoc}
     */
    public function getSaveData($value)
    {
        return strlen($value) ? $value : null;
    }
}