<?php 

namespace app\core\services\operation;

use yii\base\Model;
use yii\db\ActiveRecord;

interface ModelOperationsInterface {
    
    /**
     * 
     * @param Model $form
     * @return ActiveRecord
     */
    public function create ($form);
    
    /**
     * 
     * @param ActiveRecord $model
     * @param Model $form
     */
    public function edit ($model, $form);
    
}