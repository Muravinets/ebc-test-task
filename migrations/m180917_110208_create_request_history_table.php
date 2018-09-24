<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request_history`.
 */
class m180917_110208_create_request_history_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('request_history', [
			'id'        => $this->primaryKey(),
			'user_id'   => $this->integer(),
			'n'         => $this->integer()->notNull(),
			'arr'       => $this->text()->notNull(),
			'result'    => $this->integer()->notNull(),
			'created_at'=> $this->timestamp()->notNull(),
		]);

		$this->createIndex(
			'idx-request_history-user_id',
			'request_history',
			'user_id'
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropIndex(
			'idx-request_history-user_id',
			'request_history'
		);

		$this->dropTable('request_history');
	}
}
