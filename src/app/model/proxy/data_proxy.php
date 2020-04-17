<?php
namespace puremvc\model\proxy;

use puremvc\facade;
use puremvc\model\vo\data_vo;
use ounun\mvc\patterns\proxy;

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
 * The ApplicationDataProxy manipulates the ApplicationDataVO which
 * contains all of the general application data.
 */
class data_proxy extends proxy
{
    const Name = 'ApplicationDataProxy';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(self::Name, new data_vo());
    }

    /**
     * Loads a CSS file selected from the index.php page and
     * sends a notification when the data is complete.
     * @param mixed $cssFileName
     */
    public function loadCSS($cssFileName)
    {
        $this->data_vo_get()->view_data        = [];
        $this->data_vo_get()->view_data['css'] = $this->_getViewCSS($cssFileName);
        $this->send(facade::View_Data_Ready, $this->data_vo_get()->view_data);
    }

    /**
     * Does the actual file loading of the CSS file.
     *
     * @param mixed $cssName
     * @return string String value of the CSS loaded.
     */
    private function _getViewCSS($cssName)
    {
        $cssPath  = "src/org/puremvc/php/multicore/demos/basic/view/templates/css/$cssName.css";
        $contents = file_get_contents($cssPath);
        return $contents;
    }

    /**
     * Public getter for <code>ApplicationDataVO</code>
     *
     * @return data_vo The instance of ApplicationDataVO
     */
    public function data_vo_get()
    {
        return $this->data_get();
    }
}
