<?php namespace Wirelab\QuotesWidgetExtension;

use Anomaly\DashboardModule\Widget\Contract\WidgetInterface;
use Anomaly\DashboardModule\Widget\Extension\WidgetExtension;
use Wirelab\QuotesWidgetExtension\Command\FetchQuote;

class QuotesWidgetExtension extends WidgetExtension
{

    /**
     * This extension provides the "Quote"
     * widget for the main dashboard.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.dashboard::widget.quotes';

    /**
     * Load the widget data.
     *
     * @param WidgetInterface $widget
     */
    protected function load(WidgetInterface $widget)
    {
        $this->dispatch(new FetchQuote($widget));
    }
}
