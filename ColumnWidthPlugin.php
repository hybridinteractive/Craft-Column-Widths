<?php

namespace Craft;

class ColumnWidthPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Column Width');
    }

    public function getVersion()
    {
        return '0.0.1';
    }

    public function getDeveloper()
    {
    	// Taken to version 2.0 by Sean Delaney | DelaneyMethod
    	
        return 'Mark Busnelli Jr.';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.unleadedgroup.com';
    }
    
    public function hasCpSection()
    {
        return true;
    }

    /**
     * Register control panel routes
     */
    public function registerCpRoutes()
    {
        return array(
            'columnwidth\/widths\/new' => 'columnwidth/widths/_edit',
            'columnwidth\/widths\/(?P<widthsId>\d+)' => 'columnwidth/widths/_edit',
        );
    }

    /**
     * Add default widths after plugin is installed
     */
    public function onAfterInstall()
    {
        $widths = array(
            array(
                'name' => 'Full Width',
                'className' => 'full-width'
            ),
        );

        foreach ($widths as $widths) {
            craft()->db->createCommand()->insert('columnwidth_widths', $widths);
        }
    }
}
