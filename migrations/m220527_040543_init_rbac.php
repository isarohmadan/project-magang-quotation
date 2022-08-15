<?php

use yii\db\Migration;

/**
 * Class m220527_040543_init_rbac
 */
class m220527_040543_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $adminAccess = $auth->createPermission('adminAccess');
        $adminAccess->description = 'Administrator access';
        $auth->add($adminAccess);

        $userAccess = $auth->createPermission('userAccess');
        $userAccess->description = 'User access';
        $auth->add($userAccess);

        $adminRole = $auth->createRole('admin');
        $adminRole->description = 'Administrator role';
        $auth->add($adminRole);

        $userRole = $auth->createRole('user');
        $userRole->description = 'User role';
        $auth->add($userRole);

        // assign permission to role
        $auth->addChild($adminRole, $adminAccess);
        $auth->addChild($userRole, $userAccess);

        // assign default admin to `admin` role
        $auth->assign($adminRole, 1);
        // assign default billing to `billing` role
        $auth->assign($userRole, 2);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
