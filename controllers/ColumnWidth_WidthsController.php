<?php

namespace Craft;

/**
 * Widths Controller
 *
 * Defines actions which can be posted to by forms in our templates.
 */
class ColumnWidth_WidthsController extends BaseController
{
    /**
     * Save Widths
     *
     * Create or update an existing widths, based on POST data
     */
    public function actionSaveWidths()
    {
        $this->requirePostRequest();

        if ($id = craft()->request->getPost('widthsId')) {
            $model = craft()->columnWidth_widths->getWidthsById($id);
        } else {
            $model = craft()->columnWidth_widths->newWidths($id);
        }

        $attributes = craft()->request->getPost('widths');
        $model->setAttributes($attributes);

        if (craft()->columnWidth_widths->saveWidths($model)) {
            craft()->userSession->setNotice(Craft::t('Width saved.'));

            return $this->redirectToPostedUrl(array('widthsId' => $model->getAttribute('id')));
        } else {
            craft()->userSession->setError(Craft::t("Couldn't save width."));

            craft()->urlManager->setRouteVariables(array('widths' => $model));
        }
    }

    /**
     * Delete Widths
     *
     * Delete an existing widths
     */
    public function actionDeleteWidths()
    {
        $this->requirePostRequest();
        $this->requireAjaxRequest();

        $id = craft()->request->getRequiredPost('id');
        craft()->columnWidth_widths->deleteWidthsById($id);

        $this->returnJson(array('success' => true));
    }
}
