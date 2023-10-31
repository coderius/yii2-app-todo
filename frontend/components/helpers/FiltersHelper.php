<?php


namespace frontend\components\helpers;

use common\helpers\CountriesHelper;
use Yii;
use common\models\Categories;
use common\models\User;
use common\models\AuthAssignment;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * Class FiltersHelper
 * @package backend\helpers
 */
class FiltersHelper
{
    /**
     * Get Categories for dropdown
     * @return array
     */
    public static function getCategories(): array
    {
        return ArrayHelper::map( Categories::find()->all(), 'id', 'name' );
    }
}