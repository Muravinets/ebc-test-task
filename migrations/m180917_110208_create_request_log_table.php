<?php

use yii\db\Migration;

/**
 * Handles the creation of table `request_log`.
 */
class m180917_110208_create_request_log_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('request_log', [
			'id'        => $this->primaryKey(),
			'user_id'   => $this->integer(),
			'n'         => $this->integer()->notNull(),
			'arr'       => $this->text()->notNull(),
			'result'    => $this->integer()->notNull(),
			'created_at'=> $this->integer()->notNull(),
		]);

		$this->createIndex(
			'idx-request_log-user_id',
			'request_log',
			'user_id'
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropIndex(
			'idx-request_log-user_id',
			'request_log'
		);

		$this->dropTable('request_log');
	}
}
