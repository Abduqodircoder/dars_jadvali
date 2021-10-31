<?php

namespace backend\controllers;

use common\models\BookRoom;
use common\models\search\BookRoomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookRoomController implements the CRUD actions for BookRoom model.
 */
class BookRoomController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all BookRoom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookRoomSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BookRoom model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BookRoom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BookRoom();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BookRoom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BookRoom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRoom($id)
    {
        $para = [1=>1,2,3,4,5,6];
        $id = explode("_", $id);
        $week_id = $id[0];
        $room_id = $id[1];
        if (!empty($week_id) && !empty($room_id)){
            $paras = BookRoom::find()->select(['para'])->andWhere(['week_id' =>$week_id, 'room_id' => $room_id])->asArray()->all();
            $diff = array_diff($para,$paras);
            echo "<option>tanlang</option>";
            foreach ($diff as $p)
            {
                echo "<option value=$p>$p</option>";
            }
        }else
        echo "<option>Ma'lumot yo'q</option>";
    }

    public function actionGroup($id)
    {
        $id = explode("_", $id);
        $week_id = $id[0];
        $room_id = $id[1];
        $para = $id[2];
        if (!empty($week_id) && !empty($room_id) && !empty($para)){
            $dj = BookRoom::find()->select(['dj_table_id'])->andWhere(['week_id' =>$week_id, 'room_id' => $room_id,'para' => $para])->asArray()->all();
            if(!empty($dj))
            {
                $djTable = \common\models\DjTable::find()->andWhere(['not in','id',$dj])->all();
            }else{
                $djTable = \common\models\DjTable::find()->all();
            }

            if(!empty($djTable)){
                echo "<option>tanlang</option>";
                foreach($djTable as $dt){
                    echo "<option value='".$dt->id."'>".$dt->getName()."</option>";
                }

            }else
                echo "<option>Guruh yo'q</option>";
        }

    }

    /**
     * Finds the BookRoom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BookRoom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookRoom::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}