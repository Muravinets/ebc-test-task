<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "request_log".
 *
 * @property int $id
 * @property int $user_id
 * @property int $n
 * @property array $arr
 * @property int $result
 * @property string $created_at
 */
class RequestLog extends \yii\db\ActiveRecord
{
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::class,
				'updatedAtAttribute' => false,
			],
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['n', 'arr', 'result'], 'required'],
            [['user_id', 'n', 'result'], 'integer'],
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
