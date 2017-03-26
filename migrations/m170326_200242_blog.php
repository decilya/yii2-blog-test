<?php

use yii\db\Migration;

class m170326_200242_blog extends Migration
{
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(250)->notNull()->unique(),
        ], $tableOptions);

        $this->createTable('blog', [
            'id' => $this->primaryKey(),
            'title' => $this->string(250)->notNull()->unique(),
            'anons' => $this->text()->notNull(),
            'content' => $this->text()->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'category_id' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'status' => $this->integer(1)->defaultValue(0),
        ], $tableOptions);

        $this->createIndex('idx_blog_category', 'blog', 'category_id');
        $this->createIndex('idx_blog_user', 'blog', 'user_id');
    }

    public function down()
    {
        $this->dropIndex(
            'idx_blog_user',
            'blog'
        );

        $this->dropIndex(
            'idx_blog_category',
            'blog'
        );

        $this->dropTable('blog');
        $this->dropTable('category');
    }

}
