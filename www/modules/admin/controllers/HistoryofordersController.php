<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\HistoryOForders;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\OrderGoods;
use app\modules\admin\models\Goods;
/**
 * HistoryOFordersController implements the CRUD actions for HistoryOForders model.
 */
class HistoryofordersController extends AppAdminController
{
    /**
     * @inheritdoc
     */
public function tableName(){
    return 'HistoryOForders';
}

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all HistoryOForders models.
     * @return mixed
     */
    public function actionIndex()
    {
         $dataProvider = new ActiveDataProvider([
             'query' => HistoryOForders::find(),
         ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HistoryOForders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $goodsorder = $model->orderGoods;
         foreach ($goodsorder as $key => $good) {
            if (!$i) {
               $ids .= $good['id_good'];
               $i++;
            }else{
                $ids .= ','.$good['id_good'];
            }
         }
        $goods = Yii::$app->db->createCommand("SELECT * FROM goods WHERE id IN (".$ids.")")->queryAll();
        return $this->render('view', [
            'model' => $model,
            'goods' =>$goods
        ]);
    }

    /**
     * Creates a new HistoryOForders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HistoryOForders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HistoryOForders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HistoryOForders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HistoryOForders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HistoryOForders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HistoryOForders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
