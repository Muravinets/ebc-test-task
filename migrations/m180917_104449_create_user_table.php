<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180917_104449_create_user_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('user', [
			'id'        => $this->primaryKey(),
			'username'  => $this->string()->notNull()->unique(),
			'password'  => $this->string()->notNull(),
		]);

		$this->createIndex(
			'idx-user-username',
			'user',
			'username'
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropIndex(
			'idx-user-username',
			'user'
		);

		$this->dropTable('user');
	}
}
