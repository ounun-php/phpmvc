<?php
namespace puremvc\view;
use puremvc\facade;
use ounun\mvc\interfaces\inotification;


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
 * The ApplicationMediator updates the display of the view
 * when data is ready to be displayed.
 */
class mediator extends \ounun\mvc\patterns\mediator
{
    const Name = 'ApplicationMediator';

    /**
     * Constructor
     * @param mixed $view
     */
    public function __construct($view)
    {
        parent::__construct(self::Name, $view);
    }

    /**
     * Lists the notifications that this mediator is interested in.
     * VIEW_DATA_READY is sent by the ApplicationDataProxy when it is
     * done loading data.
     */
    public function notification_list_interests()
    {
        return [facade::View_Data_Ready];
    }

    /**
     * Handles notifications sent by the PureMVC framework that this
     * Mediator is interested in.
     * @param inotification $notification
     */
    public function notification_handle(inotification $notification)
    {
        switch ($notification->name_get()) {
            case facade::View_Data_Ready:
                $this->_print_display($notification);
                break;
            default:
                break;
        }
    }

    /**
     * Prints the view to the browser when the VIEW_DATA_READY
     * notification is sent.
     * @param INotification $notification
     */
    private function _print_display(INotification $notification)
    {
        $viewData = $notification->body_get();
        $css      = $viewData['css'];
        $template = $this->view_component_get()->view_template_get();
        $output   = str_replace('{css}', $css, $template);
        print($output);
    }

    /**
     * Public getter for the view class instance.
     *
     * @return view object.
     */
    public function view_component_get()
    {
        return $this->view_component_get();
    }
}
