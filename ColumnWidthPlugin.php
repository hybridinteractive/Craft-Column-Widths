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
        return '1.0.2';
    }

    public function getDeveloper()
    {
        return 'Mark Busnelli Jr.';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.encryptdesigns.com';
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
     * Get the plugin's Settings route
     *
     * @return mixed
     */
    public function getSettingsUrl()
    {
        return 'columnwidth';
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
