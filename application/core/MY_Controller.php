<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'TODO List Manager';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{
        $this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'),true);
    	// use layout content if provided
    	if (!isset($this->data['content']))
        	$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		$this->parser->parse($template, $this->data);
		$this->data['leftside'] = $this->makePrioritizedPanel($tasks);
		$this->data['rightside'] = $this->makeCategorizedPanel($tasks);
	}
	function makePrioritizedPanel($tasks) {
		// extract the undone tasks
    	foreach ($undone as $task)
    		$converted[] = (array) $task;
		usort($undone, "orderByPriority");
    	$parms = ['display_tasks' => $converted];
    	return $this->parser->parse('by_priority', $parms, true);
	}
	
	// return -1, 0, or 1 of $a's priority is higher, equal to, or lower than $b's
function orderByPriority($a, $b)
{
    if ($a->priority > $b->priority)
        return -1;
    elseif ($a->priority < $b->priority)
        return 1;
    else
        return 0;
}
}
