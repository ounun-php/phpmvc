<?php
namespace puremvc\controller\commands;

use puremvc\basic;
use puremvc\controller\commands\model_start_comm;
use puremvc\facade;
use ounun\mvc\patterns\command\macro_command;



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
 * The <code>StartApplicationCommand</code> prepares the view first
 * so that it is ready to display data when the model is done loading.
 */
class app_start_comm extends macro_command
{
    protected $facade;

    public function __construct()
    {
        parent::__construct();
        $this->facade = facade::i(basic::Basic_Core);

    }

    /**
     * The <code>initializeMacroCommand</code> is overridden to
     * add references to instances of SimpleCommand that should
     * be executed.
     */
    protected function initialize_macro_command()
    {
        $this->sub_command_add(view_start_comm::class);
        $this->sub_command_add(model_start_comm::class);
    }
}
