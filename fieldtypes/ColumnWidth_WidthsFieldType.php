<?php

namespace Craft;

/**
 * Widths Fieldtype
 *
 * Allows entries to select associated widths
 */
class ColumnWidth_WidthsFieldType extends BaseFieldType
{
    /**
     * Get the name of this fieldtype
     */
    public function getName()
    {
        return Craft::t('Column Widths');
    }

    /**
     * Get this fieldtype's column type.
     *
     * @return mixed
     */
    public function defineContentAttribute()
    {
        // "Mixed" represents a "text" column type, which can be used to store arrays etc.
        return AttributeType::Mixed;
    }

    /**
     * Get this fieldtype's form HTML
     *
     * @param  string $name
     * @param  mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
        // call our service layer to get a current list of widths
        $widths = craft()->columnWidth_widths->getAllWidths();

        // create an array for the widths 
        $widthsOptions = array();

        // populate the $widthsOptions array with $widths to build out the dropdown
        foreach ($widths as $width )
        {
            $widthsOptions[] = array(
                'label' => $width->name,
                'value' => $width->name,
            );
        }

        return craft()->templates->render('columnwidth/_fieldtypes/widths', array(
            'name'      => $name,
            'values'    => $value,
            'options'   => $widthsOptions,
        ));
    }
}
