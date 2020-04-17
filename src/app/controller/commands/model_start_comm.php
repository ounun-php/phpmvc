<?php
namespace puremvc\controller\commands;


use puremvc\basic;
use puremvc\model\proxy\data_proxy;
use ounun\mvc\interfaces\inotification;
use ounun\mvc\patterns\command\simple_command;
use ounun\mvc\patterns\facade;

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
 * Starts the application model, for the basic demo
 * this command loads the CSS file selected on the index.php page.
 */
class model_start_comm extends simple_command
{
    protected $facade;

    /**
     * StartModelCommand constructor.
     */
    public function __construct()
    {
        // parent::__construct();
        $this->facade = facade::i(basic::Basic_Core);
    }
    /**
     * Override execute to add logic.  In the <code>StartModelCommand</code>
     * the ApplicationDataProxy is started and registered, and then
     * the selected CSS file is loaded.
     * @param inotification $notification
     */
    public function execute(inotification $notification)
    {
        $view = $notification->body_get();
        $cssFileName = $notification->type_get();

        $applicationDataProxy = new data_proxy();
        $this->facade->proxy_register($applicationDataProxy);

        $applicationDataProxy->loadCSS($cssFileName);
    }
}
