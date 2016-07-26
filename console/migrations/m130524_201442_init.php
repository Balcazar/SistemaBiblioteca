<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            #//////////////
            'nombre' => $this->string(),
            'apellidos' => $this->string(),
            'dieccion' => $this->string(),
            'telefono' => $this->string(),
            #/////////////
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        
        $this->createTable('{{%Libros}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'autor' => $this->string(),
            'categoria' => $this->string(),
            'sinopsis' => $this->text(),
            'status' => $this->string(),
            ], $tableOptions);
        
        $this->createTable('{{%Clientes}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'apellidos' => $this->string(),
            'fechaNacimiento' => $this->date(),
            'direccion' => $this->string(),
            'telefono' => $this->string()
            ], $tableOptions);
        
        $this->createTable('{{%Prestamos}}', [
            'id' => $this->primaryKey(),
            'idLibro' => $this->integer(),
            'idCliente' => $this->integer(),
            'fechaPrestamo' => $this->date()
            ], $tableOptions);
        
        $this->addForeignKey('FK_prom_proy', 'Prestamos', 'idLibro', 'Libros', 'Id');
        $this->addForeignKey('FK_pres_proy', 'Prestamos', 'idCliente', 'Clientes', 'Id');
    }

    public function down()
    {
        $this->dropForeignKey('FK_prom_proy', 'Prestamos');
        $this->dropForeignKey('FK_pres_proy', 'Prestamos');
        
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%Libros}}');
        $this->dropTable('{{%Clientes}}');
        $this->dropTable('{{%Prestamos}}');
    }
}
