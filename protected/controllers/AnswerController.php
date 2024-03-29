<?php

class AnswerController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','search'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('voteup','votedown'),
				'users'=>array('@')),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'roles'=>array('teacher'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Answer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Answer']))
		{
			$model->attributes=$_POST['Answer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Answer']))
		{
			$model->attributes=$_POST['Answer'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// check if this user can delete this post
		if(Yii::app()->user->checkAccess('teacher') or Yii::app()->user->checkAccess('admin')){

			if(Yii::app()->user->id == $this->loadModel($id)->author_id or Yii::app()->user->checkAccess('admin')){

				$this->loadModel($id)->delete();

				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_GET['ajax'])){
					// if the user is admin
					if(Yii::app()->user->checkAccess('admin'))
						$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
					else
						$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('question/'));
				}
			}

			else{
				throw new CHttpException(401,"You don't have permission to delete this");
			}


		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Answer');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionSearch()
	{
		// $dataProvider=new CActiveDataProvider('Question');
		$model=new Answer('search');
		if(isset($_GET['Answer']))
			$model->attributes=$_GET['Answer'];

		$this->render('search',array(
			// 'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Answer('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Answer']))
			$model->attributes=$_GET['Answer'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Answer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Answer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Answer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='answer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Upvotes the given answer
	 * @param  integer $id Question ID
	 */
	public function actionVoteUp($id)
	{
		$model=Answer::model()->findByPk($id);
		$currentScore = $model->score;
		$currentScore = $currentScore + 5;
		$model->score = $currentScore;

		// get the user
		$user = User::model()->findByPk($model->author_id);
		$currentScore = $user->score;
		$currentScore = $currentScore + 5;
		$user->score = $currentScore;

		if($model->save() and $user->save()){
				$this->redirect(array('view','id'=>$model->id));
		}
	}

	/**
	 * Down votes the given answer
	 * @param  integer $id Question ID
	 */
	public function actionVoteDown($id)
	{
		$model=Answer::model()->findByPk($id);
		$currentScore = $model->score;
		$currentScore = $currentScore - 5;
		$model->score = $currentScore;

		// get the user
		$user = User::model()->findByPk($model->author_id);
		$currentScore = $user->score;
		$currentScore = $currentScore - 5;
		$user->score = $currentScore;

		if($model->save() and $user->save()){
				$this->redirect(array('view','id'=>$model->id));
		}
	}
}
