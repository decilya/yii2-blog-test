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
       	
       	if (Yii::$app->request->post('Category')) {
       		
    		$category->attributes = Yii::$app->request->post('Category');
    		$category->created_at = time();
    		
    		if ($category->save()) {
    				
    			//* @todo Разобратся с мгновенными собощениями в Yii2 */
    			$session = Yii::$app->session;
    			$session->setFlash('success', 'Категория добавлена успешно!');
    			$result = $session->hasFlash('success');
    			if  ($result) {
    				echo $session->getFlash('success');
    			}			
    		} else {
    			$session = Yii::$app->session;
    			$session->setFlash('error', 'Ошибка. При добавлении категории.');
    			$result = $session->hasFlash('error');
    			if  ($result) {
    				echo $session->getFlash('error');
    			}
    		}
    		
    	}
    		
        return $this->render('form', [
            'category' => $category,
        ]);

    }
}