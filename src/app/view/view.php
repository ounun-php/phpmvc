<?php
namespace puremvc\view;
/**
 * PureMVC PHP Basic Demo
 * @author Omar Gonzalez :: omar@almerblank.com
 * @author Hasan Otuome :: hasan@almerblank.com
 *
 * Created on Sep 24, 2008
 * PureMVC - Copyright(c) 2006-2008 Futurescale, Inc., Some rights reserved.
 * Your reuse is governed by the Creative Commons Attribution 3.0 Unported License
 */

/**
 * The ApplicationView class initializes the general view of the application
 * by loading a php template file used to generate a view.
 */
class view
{
    /**
     * Reference to the selected view, for basic demo this is always "/index.php"
     */
    private $_view;
    /**
     * The loaded template string (html)
     */
    private $_view_template;

    /**
     * Constructor
     * @param mixed $view
     */
    public function __construct($view)
    {
        $this->_view = $view;
        $this->_initialize_view();
    }

    /**
     * Initializes the view by loading the index.php template
     */
    private function _initialize_view()
    {
        switch ($this->_view) {
            default:
                $file = 'src/org/puremvc/php/multicore/demos/basic/view/templates/index_template.php';
                break;
        }

        if (!$file) {
            return;
        }

        $display = file_get_contents($file);
        if ($display) {
            $this->_view_template = $display;
        } else {
            $display              = 'Sorry, error creating page.';
            $this->_view_template = $display;
        }
    }

    /**
     * Public getter for the view template.
     */
    public function view_template_get()
    {
        return $this->_view_template;
    }
}
