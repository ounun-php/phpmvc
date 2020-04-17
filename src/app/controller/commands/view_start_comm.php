<?php
namespace puremvc\controller\commands;

use puremvc\basic;
use puremvc\view\mediator;
use puremvc\view\view;
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
 * Starts the view class which initializes php/html templates.
 */
class view_start_comm extends simple_command
{
    protected $facade;

    public function __construct()
    {
        $this->facade = facade::i(basic::Basic_Core);
    }

    /**
     * The <code>execute()</code> method is overridden in order
     * to add your application logic for this specific command.
     * @param inotification $notification
     */
    public function execute(inotification $notification)
    {
        $view = $notification->body_get();
        $this->facade->mediator_register(new mediator(new view($view)));
    }
}
