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

        $errors = null;
        if (!empty($post)){

            $title = $post['Category']['title'];

            $newCategory = $category->create($title);

            if ($newCategory->hasErrors()){
                $errors = $newCategory->errors;
            } else {
                $errors = array();
            }

            $category->save();
        }

        return $this->render('form', [
            'category' => $category,
            'errors' => $errors,
        ]);

    }
}