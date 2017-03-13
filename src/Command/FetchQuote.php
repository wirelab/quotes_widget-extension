<?php namespace Wirelab\QuotesWidgetExtension\Command;

use Anomaly\DashboardModule\Widget\Contract\WidgetInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class FetchQuote
 */
class FetchQuote
{

    use DispatchesJobs;

    /**
     * The widget instance.
     *
     * @var WidgetInterface
     */
    protected $widget;

    /**
     * Create a new FetchQuote instance.
     *
     * @param WidgetInterface $widget
     */
    public function __construct(WidgetInterface $widget)
    {
        $this->widget = $widget;
    }

    /**
     * Handle the widget data.
     */
    public function handle()
    {
    	// Fetch a random quote
    	$quote = $this->fetchQuote();

        // Load the items to the widget's view data.
        $this->widget->addData('quote', $quote);
    }

    /**
     * Fetch a quote
     *
     * @return array['id' => 0, 'quote' => '', 'author' => '', 'link' => '']
     */
    public function fetchQuote()
    {
    	$url     = 'http://quotesondesign.com/wp-json/posts?filter[orderby]=rand';
    	$request = file_get_contents($url);
    	$json    = json_decode($request, true);
    	$quote  = [
    		'quote' => $json[0]['content'],
    		'author' => $json[0]['title'],
    		'source' => $json[0]['link'],
    	];

    	return $quote;
    }
}
