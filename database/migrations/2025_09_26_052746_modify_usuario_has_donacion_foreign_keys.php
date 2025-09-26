<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('usuario_has_donacion', function (Blueprint $table) {
            // Elimina la clave foránea actual que apunta a 'usuario'
            $table->dropForeign(['usuario_id_usuario']);

            // Crea la nueva clave foránea que apunta a 'users'
            $table->foreign('usuario_id_usuario')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('usuario_has_donacion', function (Blueprint $table) {
            // Revertir cambios si haces rollback
            $table->dropForeign(['usuario_id_usuario']);
            $table->foreign('usuario_id_usuario')
                  ->references('id_usuario')
                  ->on('usuario')
                  ->onDelete('cascade');
        });
    }
};