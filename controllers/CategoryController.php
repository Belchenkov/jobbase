<?php

namespace app\controllers;

use app\models\Category;
use yii\data\Pagination;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //Create Query
        $query = Category::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),

        ]);

        $categories = $query->orderBy('name')
                            ->offset($pagination->offset)
                            ->limit($pagination->limit)
                            ->all();

        return $this->render('index', [
            'categories' => $categories,
            'pagination' => $pagination,
        ]);
    }

    public function actionCreate()
    {
        $category = new Category();

        if ($category->load(Yii::$app->request->post())) {
            //validation
            if ($category->validate()) {
                //Save Record
                $category->save();
                // Send Message
                Yii::$app->getSession()->setFlash('success', 'Category Added');

                return $this->redirect('index.php?r=category');
            }
        }

        return $this->render('create', [
            'category' => $category,
        ]);
    }



}
