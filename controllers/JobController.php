<?php

namespace app\controllers;

use app\models\Category;
use app\models\Job;
use yii\data\Pagination;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class JobController extends \yii\web\Controller
{
    /**
     * Access Control

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'edit', 'delete'],
                'rules' => [
                    [
                        'actions' => ['creare', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }
     */
    public function actionIndex()
    {
        //Create Query
        $query = Job::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),

        ]);

        $jobs = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'jobs' => $jobs,
            'pagination' => $pagination,
        ]);
    }

    public function actionCreate()
    {
        $job = new Job();

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                // Save
                $job->save();

                //Show Message
                Yii::$app->getSession()->setFlash('Success', 'Вакансия добавлена');

                //Redirect
                return $this->redirect('index.php?r=job');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);
    }

    public function actionDetails($id)
    {
        //Get Job
        $job = Job::find()
                  ->where(['id' => $id])
                  ->one();
        //Render View
        return $this->render('details', ['job' => $job]);
    }

    public function actionDelete($id)
    {
        $job = Job::findOne($id);

        //Check For Owner
        if(Yii::$app->user->identity->id != $job->user_id) {
            //Redirect
            return $this->redirect('index.php?r=job');
        }

        $job->delete();

        //Show Message
        Yii::$app->getSession()->setFlash('Success', 'Вакансия удалена');

        //Redirect
        return $this->redirect('index.php?r=job');
    }

    public function actionEdit($id)
    {
        $job = Job::findOne($id);

        //Check For Owner
        if(Yii::$app->user->identity->id != $job->user_id) {
            //Redirect
            return $this->redirect('index.php?r=job');
        }

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                // Save
                $job->save();

                //Show Message
                Yii::$app->getSession()->setFlash('Success', 'Вакансия добавлена');

                //Redirect
                return $this->redirect('index.php?r=job');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);
    }

}
