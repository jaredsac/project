<?php

namespace app\controllers;

use Yii;
use app\models\Bestelling;
use app\models\BestellingSearch;
use app\models\Medewerker;
use app\models\Menu;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BestellingController implements the CRUD actions for Bestelling model.
 */
class BestellingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    // when logged in as admin
                    [
                        'actions' => ['create', 'update', 'delete', 'index', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (Yii::$app->user->identity->role == 'admin');
                        }
                    ],
                    // when logged in as user/medewerker
                    [
                        'actions' => ['create', 'update', 'delete', 'index', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (Yii::$app->user->identity->role == 'user');
                        }
                    ],


                    // when logged in, any user but you need to be logged in!
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],

                ],
            ],
        ];
    }

    /**
     * Lists all Bestelling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BestellingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $medewerkers = Medewerker::find()->all();
        $menus = Menu::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'medewerkers' => $medewerkers,
            'menus' => $menus
        ]);
    }

    /**
     * Displays a single Bestelling model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {;
        $medewerkers = Medewerker::find()->all();
        $menus = Menu::find()->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'medewerkers' => $medewerkers,
            'menus' => $menus
        ]);
    }

    /**
     * Creates a new Bestelling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bestelling();
        $medewerkers = Medewerker::find()->all();
        $menus = Menu::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'medewerkers' => $medewerkers,
            'menus' => $menus
        ]);
    }

    /**
     * Updates an existing Bestelling model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $medewerkers = Medewerker::find()->all();
        $menus = Menu::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'medewerkers' => $medewerkers,
            'menus' => $menus
        ]);
    }

    /**
     * Deletes an existing Bestelling model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bestelling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bestelling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bestelling::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
