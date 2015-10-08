<?php

namespace Craft;

/**
 * Column Width Variable provides access to database objects from templates
 */
class ColumnWidthVariable
{
    /**
     * Get all available widths
     *
     * @return array
     */
    public function getAllWidths()
    {
        return craft()->columnWidth_widths->getAllWidths();
    }

    /**
     * Get a specific widths. If no widths is found, returns null
     *
     * @param  int   $id
     * @return mixed
     */
    public function getWidthsById($id)
    {
        return craft()->columnWidth_widths->getWidthsById($id);
    }

    /**
     * Get a specific width name. If no width names found, returns null
     *
     * @param  int   $id
     * @return mixed
     */
    public function getClassNameFromColumnName($id)
    {
        return craft()->columnWidth_widths->getClassNameFromColumnName($id);
    }
}
