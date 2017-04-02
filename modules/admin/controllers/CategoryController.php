<?php

namespace app\modules\admin\controllers;

/**
 * @todo разобратся с тем что такое AccessControl и что точно мы тут юзамем, ничего лишнего в коде быть не должно
 */
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Category;


/**
 * Category controller for the `admin` module
 */
class CategoryController extends DefaultController
{

    public $defaultAction = 'list';

    public function actionList()
    {
        return $this->render('list');
    }

}