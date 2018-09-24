<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request_history".
 *
 * @property int $id
 * @property int $user_id
 * @property int $n
 * @property array $arr
 * @property int $result
 * @property string $created_at
 */
class RequestHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
//    	return [];
        return [
            [['user_id', 'n', 'result'], 'integer'],
            [['n', 'arr', 'result'], 'required'],
            [['array', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'n' => 'N',
            'arr' => 'Array',
            'result' => 'Result',
            'created_at' => 'Created At',
        ];
    }
}
