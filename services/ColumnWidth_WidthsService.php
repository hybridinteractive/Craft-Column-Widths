<?php

namespace Craft;

/**
 * Column Width Service
 *
 * Provides a consistent API for our plugin to access the database
 */
class ColumnWidth_WidthsService extends BaseApplicationComponent
{
    protected $widthsRecord;

    /**
     * Create a new instance of the Column Widths Service.
     * Constructor allows WidthsRecord dependency to be injected to assist with unit testing.
     *
     * @param @widthsRecord WidthsRecord The widths record to access the database
     */
    public function __construct($widthsRecord = null)
    {
        $this->widthsRecord = $widthsRecord;
        if (is_null($this->widthsRecord)) {
            $this->widthsRecord = ColumnWidth_WidthsRecord::model();
        }
    }

    /**
     * Get a new blank widths
     *
     * @param  array                           $attributes
     * @return ColumnWidth_WidthsModel
     */
    public function newWidths($attributes = array())
    {
        $model = new ColumnWidth_WidthsModel();
        $model->setAttributes($attributes);

        return $model;
    }

    /**
     * Get all widths from the database.
     *
     * @return array
     */
    public function getAllWidths()
    {
        $records = $this->widthsRecord->findAll(array('order'=>'t.name'));

        return ColumnWidth_WidthsModel::populateModels($records, 'id');
    }

    /**
     * Get a specific widths from the database based on ID. If no widths exists, null is returned.
     *
     * @param  int   $id
     * @return mixed
     */
    public function getWidthsById($id)
    {
        if ($record = $this->widthsRecord->findByPk($id)) {
            return ColumnWidth_WidthsModel::populateModel($record);
        }
    }

    /**
     * Get a specific width class names from the database based on ID. If no widths exists, null is returned.
     *
     * @param  int   $id
     * @return mixed
     */
    public function getClassNameFromColumnName($className)
    {

        $columnWidth = $this->widthsRecord->findByAttributes(array('name' => $className));

        return ColumnWidth_WidthsModel::populateModel($columnWidth);
    }

    /**
     * Save a new or existing widths back to the database.
     *
     * @param  ColumnWidth_WidthsModel $model
     * @return bool
     */
    public function saveWidths(ColumnWidth_WidthsModel &$model)
    {
        if ($id = $model->getAttribute('id')) {
            if (null === ($record = $this->widthsRecord->findByPk($id))) {
                throw new Exception(Craft::t('Can\'t find width with ID "{id}"', array('id' => $id)));
            }
        } else {
            $record = $this->widthsRecord->create();
        }

        $record->setAttributes($model->getAttributes());
        if ($record->save()) {
            // update id on model (for new records)
            $model->setAttribute('id', $record->getAttribute('id'));

            return true;
        } else {
            $model->addErrors($record->getErrors());

            return false;
        }
    }

    /**
     * Delete an widths from the database.
     *
     * @param  int $id
     * @return int The number of rows affected
     */
    public function deleteWidthsById($id)
    {
        return $this->widthsRecord->deleteByPk($id);
    }
}
