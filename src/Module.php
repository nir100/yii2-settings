<?php 
namespace newrow\settings;

use yii\base\Module as BaseModule; 

class Module extends BaseModule
{

	 /**
     * @var array the list of rights that are allowed to access this module.
     * If you modify, you also need to enable authManager.
     * http://www.yiiframework.com/doc-2.0/guide-security-authorization.html
     */
    public $roles = [];


	public $controllerNamespace = 'newrow\settings\controllers';

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if ($this->checkRoles()) {
            return parent::beforeAction($action);
        } else {
            throw new ForbiddenHttpException('You are not allowed to access this page.');
        }
    }

	 /**
     * Determines if the current user has the necessary privileges for online translation.
     *
     * @param array $roles The necessary roles for accessing the module.
     *
     * @return bool
     */
    private function checkRoles($roles)
    {
        if (!$roles) {
            return true;
        }

        foreach ($roles as $role) {
            if (Yii::$app->user->can($role)) {
                return true;
            }
        }

        return false;
    }

}