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

        $categories = new Category();

        return $this->render('list', [
            'categories' => $categories,
        ]);
    }

    public function actionCreate()
    {
        $category = new Category();

        $post = Yii::$app->request->post();

        if (!empty($post)){
            echo "<pre>";
            echo 'тыщ-тыщ';
            print_r($post);
            var_export($post);
            echo "</pre>";

            $title = $post['Category']['title'];

            if ($category->create($title)){
                echo 'успех';
            }
        }

        return $this->render('form', [
            'category' => $category,
        ]);

    }
}