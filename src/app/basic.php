<?php
namespace puremvc;
/**
 * PureMVC PHP Basic Demo
 * PureMVC Port to PHP originally translated by Asbjørn Sloth Tønnesen
 *
 * @author Omar Gonzalez :: omar@almerblank.com
 * @author Hasan Otuome :: hasan@almerblank.com
 *
 * Created on Sep 24, 2008
 * PureMVC - Copyright(c) 2006-2008 Futurescale, Inc., Some rights reserved.
 * Your reuse is governed by the Creative Commons Attribution 3.0 Unported License
 */

/**
 * PureMVC PHP Basic demo base class.  The index starts an
 * instance of the BasicDemo object to start the application
 * view calling the <code>startView()</code> method.
 */
class basic
{
    /** @var string 基本核标识 */
    const Basic_Core = 'basic';

    /**
     * Starts the PureMVC framework passing in variables
     * from the index.php
     * @param mixed $filename
     * @param mixed $css_name
     */
    public function start_view($filename, $css_name)
    {
        $facade = facade::i( static::Basic_Core);
        $facade->start_up($filename, $css_name);
    }
}
