<?php

namespace Craft;

use Craft;
use yii\base\Event;

/**
 * Custom module class.
 *
 * This class will be available throughout the system via:
 * `Craft::$app->getModule('my-module')`.
 *
 * You can change its module ID ("my-module") to something else from
 * config/app.php.
 *
 * If you want the module to get loaded on every request, uncomment this line
 * in config/app.php:
 *
 *     'bootstrap' => ['my-module']
 *
 * Learn more about Yii module development in Yii's documentation:
 * http://www.yiiframework.com/doc-2.0/guide-structure-modules.html
 */

class DataPlumber extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        // Submissions
        craft()->on(
            "freeform_submissions.onAfterSave",
            function (Event $event) {
                $submission = $event->params["model"];
                $isNew    = $event->params["isNew"];
                error_log($submission);
            }
        );

    }
}