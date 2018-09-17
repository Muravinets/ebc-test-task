<?php

use yii\db\Migration;

/**
 * Class m180917_111510_seed_user_table
 */
class m180917_111510_seed_user_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->insert('user', [
			'username' => 'admin',
			'password' => 'admin',
		]);

		$this->insert('user', [
			'username' => 'demo',
			'password' => 'demo',
		]);

		$this->insert('user', [
			'username' => 'test',
			'password' => 'test password',
		]);
	}

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180917_111510_seed_user_table cannot be reverted.\n";

        return false;
    }
}
