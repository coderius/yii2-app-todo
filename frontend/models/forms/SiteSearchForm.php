<?php

namespace frontend\models\forms;

use Yii;
use yii\base\Model;

/**
 * CreateUserForm form
 */
class SiteSearchForm extends Model
{
    public $txtSearch;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['txtSearch', 'safe'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {

        return [
            'txtSearch' => Yii::t('messages', 'Search'),
        ];
    }

}
