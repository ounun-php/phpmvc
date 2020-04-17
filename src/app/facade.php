<?php
namespace puremvc;

use puremvc\controller\commands\app_start_comm;

/**
 * PureMVC PHP Basic Demo
 * @author Omar Gonzalez :: omar@almerblank.com
 * @author Hasan Otuome :: hasan@almerblank.com
 *
 * Created on Sep 24, 2008
 * PureMVC - Copyright(c) 2006-2008 Futurescale, Inc., Some rights reserved.
 * Your reuse is governed by the Creative Commons Attribution 3.0 Unported License
 */
//require_once 'org/puremvc/php/patterns/facade/Facade.php';

// demo requires
//require_once 'org/puremvc/php/demos/basic/controller/commands/StartApplicationCommand.php';

/**
 * ApplicationFacade for the BasicDemo starts the Model, View
 * Controller for the application.
 */
class facade extends \ounun\mvc\patterns\facade
{
    /**
     * Notification constant that starts the application.
     */
    const Start_Application = 'startApplication';

    /**
     * Notification constant sent when view data is ready to be displayed.
     */
    const View_Data_Ready   = 'viewDataReady';


    /**
     * Starts the application by sending a START_APPLICATION notification.
     * The filename (/index.php) is sent along to demonstrate passing
     * data along.
     * @param mixed $filename
     * @param mixed $css_name
     */
    public function start_up($filename, $css_name)
    {
        $this->send(self::Start_Application, $filename, $css_name);
    }

    /**
     * Initializes the controller and gives you an opportunity to register application
     * specific commands that extend SimpleCommand or MacroCommand with the PureMVC framework.
     */
    protected function initialize_controller()
    {
        parent::initialize_controller();
        $this->command_register(self::Start_Application, app_start_comm::class);
    }
}
