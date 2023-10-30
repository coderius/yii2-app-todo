<?php

namespace frontend\controllers;

use frontend\controllers\base\BaseProtectedController;
use backend\helpers\slut\FiltersHelper;
use common\helpers\FlashHelper;
use common\helpers\UserBanHelper;
use common\models\User;
use Yii;
use backend\models\search\slut\SlutGirlSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
// use yii2mod\rbac\filters\AccessControl;
use yii\filters\AccessControl;
use Exception;
use common\models\UserLog;
use common\models\slut\SlutGirl;

/**
 * GirlController implements the CRUD actions for SlutGirl model.
 */
class CategoriesController extends BaseProtectedController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [ 'index', 'view', 'create', 'update', 'delete'],
                        'allow'   => true,
                        'roles'   => [ 'user' ],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete' => [ 'POST' ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction( $action )
    {
        // if ( UserBanHelper::checkUser() ){
        //     $this->redirect( [ '/site/banned-user' ] );
        //     Yii::$app->end();
        // }

        return parent::beforeAction( $action );
    }

    /**
     * Lists all SlutGirl models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new SlutGirlSearch();
        // $dataProvider = $searchModel->search( Yii::$app->request->queryParams );

        return $this->render( 'index', [
            // 'searchModel'  => $searchModel,
            // 'dataProvider' => $dataProvider,
            // 'categories'   => FiltersHelper::getCategories(),
        ] );
    }

    // /**
    //  * Displays a single SlutGirl model.
    //  * @param integer $id
    //  * @return mixed
    //  * @throws NotFoundHttpException if the model cannot be found
    //  */
    // public function actionView( $id )
    // {
    //     Yii::$app->response->format = Response::FORMAT_JSON;

    //     return $this->renderAjax( 'view', [
    //         'model' => $this->findModel( $id ),
    //     ] );
    // }

    // /**
    //  * Creates a new SlutGirl model.
    //  * If creation is successful, the browser will be redirected to the 'view' page.
    //  * @return mixed
    //  */
    // public function actionCreate()
    // {
    //     $model = new SlutGirl();

    //     try {
    //         // $transaction = Yii::$app->db->beginTransaction();
    //         if ( $model->load( Yii::$app->request->post() ) ){
    //             $model->image = UploadedFile::getInstance( $model, 'image' );

    //             if ( $model->save() ){
    //                 // $transaction->commit();
    //                 UserLog::quickLog( Yii::$app->user->id, UserLog::SLUT_GIRL_CREATE, [ 'type' => 'Create slut girl: #' . $model->id ] );
    //                 Yii::$app->session->setFlash( 'success', Yii::t( 'messages', 'Item {name} successfully created', [ 'name' => $model->title ] ) );

    //                 return $this->redirect( [ 'index' ] );
    //             }

    //             Yii::$app->session->setFlash( 'danger', Yii::t( 'messages', 'Server error. ' ) );
    //         }

    //     } catch ( Exception $e ) {
    //         // $transaction->rollBack();
    //         FlashHelper::exeptionCatchFlash($e);
    //     }

    //     return $this->render( 'create', [
    //         'model'       => $model,
    //         'categories'  => FiltersHelper::getCategories(),
    //     ] );
    // }

    // /**
    //  * Updates an existing SlutGirl model.
    //  * If update is successful, the browser will be redirected to the 'view' page.
    //  * @param integer $id
    //  * @return mixed
    //  * @throws NotFoundHttpException if the model cannot be found
    //  */
    // public function actionUpdate( $id )
    // {
    //     $model = $this->findModel( $id );
    //     try{
    //         $transaction = Yii::$app->db->beginTransaction();
    //         if ( $model->load( Yii::$app->request->post() ) ){
    //             $model->image = UploadedFile::getInstance( $model, 'image' );

    //             if ( $model->save() ){
    //                 $transaction->commit();
    //                 UserLog::quickLog( Yii::$app->user->id, UserLog::SLUT_GIRL_UPDATE, [ 'type' => 'Update slut girl: #' . $model->id ] );
    //                 Yii::$app->session->setFlash( 'success', Yii::t( 'messages', 'Item {name} successfully updated', [ 'name' => $model->title ] ) );

    //                 return $this->redirect( [ 'index' ] );
    //             }

    //             Yii::$app->session->setFlash( 'danger', Yii::t( 'messages', 'Server error' ) );
    //         }
    //     } catch ( Exception $e ) {
    //         $transaction->rollBack();
    //         FlashHelper::exeptionCatchFlash($e);
    //     }    

    //     return $this->render( 'update', [
    //         'model'       => $model,
    //         'categories'  => FiltersHelper::getCategories(),
    //         'advertisers' => FiltersHelper::getUsersByRole( User::ROLE_GAMBADVERTISER ),
    //     ] );
    // }

    // /**
    //  * Deletes an existing SlutGirl model.
    //  * If deletion is successful, the browser will be redirected to the 'index' page.
    //  * @param integer $id
    //  * @return mixed
    //  * @throws NotFoundHttpException if the model cannot be found
    //  */
    // public function actionDelete( $id )
    // {
    //     $model = $this->findModel( $id );
    //     try{
    //         $transaction = Yii::$app->db->beginTransaction();
    //         $model->delete();
    //         $transaction->commit();
    //         UserLog::quickLog( Yii::$app->user->id, UserLog::SLUT_GIRL_DELETE, [ 'type' => 'Delete girl: #' . $model->id ] );
    //         Yii::$app->session->setFlash( 'success', Yii::t( 'messages', 'Item {name} successfully deleted', [ 'name' => $model->title ] ) );
    //     }catch ( Exception $e ) {
    //         $transaction->rollBack();
    //         if ($e instanceof yii\db\IntegrityException && $e->getCode() == 23000) {
    //             FlashHelper::exeptionCatchFlash23000($e, $model->title ?? $model->id);

    //             return $this->redirect(Yii::$app->request->referrer);
    //         }
        
    //         Yii::$app->session->setFlash( 'error', Yii::t( 'messages', 'Server error' ) );
    //         return $this->redirect(Yii::$app->request->referrer);
    //     }

    //     return $this->redirect( [ 'index' ] );


    // }

    // /**
    //  * Stata for SlutGirl model based on its primary key value.
    //  * If the model is not found, a 404 HTTP exception will be thrown.
    //  * @param integer $id
    //  * @return SlutGirl the loaded model
    //  * @throws NotFoundHttpException if the model cannot be found
    //  */
    // public function actionStata( $id )
    // {
    //     // добавляем в SlutGirlController экшн stata и вьюху под него.
    //     // Это будет страница, на которой будет выводиться стата именно по этой девке.
    //     // размести там виджет, который ты сделаешь в задаче 783. Но только уже конкретно под эту девку
    //     $model = $this->findModel($id);

    //     return $this->render( 'stata', [
    //         'model'  => $model,
    //     ] );


    // }    

    // /**
    //  * Finds the SlutGirl model based on its primary key value.
    //  * If the model is not found, a 404 HTTP exception will be thrown.
    //  * @param integer $id
    //  * @return SlutGirl the loaded model
    //  * @throws NotFoundHttpException if the model cannot be found
    //  */
    // protected function findModel( $id )
    // {
    //     if ( ($model = SlutGirl::findOne( $id )) !== null ){
    //         return $model;
    //     }

    //     throw new NotFoundHttpException( Yii::t( 'messages', 'The requested page does not exist.' ) );
    // }
}
