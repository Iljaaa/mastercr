<?php

use App\Domain\Gender;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 250); // Имя
            $table->string('middle_name', 250)->nullable(); // Отчество
            $table->string('last_name', 250); // Фамилия
            $table->enum('gender', [Gender::Male, Gender::Female, Gender::Other]);

            $table->string('birth_place', 250); // Место рождения
            $table->string('citizenship', 250); // Гражданство
            $table->boolean('relocation_ready'); // Готовность к переезду
            $table->float('salary'); // Зарплата
            $table->string('email', 250); // Почта
            $table->string('phone', 250); // Телефон

            $table->integer('rating'); // Оценка по 10-бальной системе

            $table->boolean('primary_connections')->nullable(); // Первичные соединения по подстанциям 110кВ и выше
            $table->boolean('builder_kr_substations')->nullable(); // Строитель разработка разделов КР по подстанциям
            $table->boolean('builder_kr_lines')->nullable(); // Строитель разработка КР по линиям 110 кВ линейщик фундамент
            $table->boolean('mounting_parts')->nullable(); // Монтажные части линии, расстановка опор
            $table->boolean('rza')->nullable(); // Релейная защита и автоматика (РЗА)
            $table->boolean('asuptp')->nullable(); // Автоматизированная система управления технологическим процессом (АСУТП)
            $table->boolean('askue')->nullable(); // Автоматизированная система контроля и учёта электроэнергии (АСКУЭ)
            $table->boolean('tm')->nullable(); // Телемеханика (ТМ)
            $table->boolean('ss')->nullable(); // Средства связи (СС)
            $table->boolean('ktsb')->nullable(); // Комплекс технических средств безопасности (КТСБ)

            $table->string('experience_110kv')->nullable(); // Опыт проектирования на подстанциях и воздушных линиях 110кВ
            $table->boolean('ready_to_work'); // Готовность работать

            $table->timestamps();
        });

        // Желаемая должность
        Schema::create('desired_positions', function (Blueprint $table) {
            $table->id();
            $table->string('position', 250);
            $table->timestamps();
        });

        // специализации
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('specialization', 1024);
            $table->timestamps();
        });

        // Вспомогательная таблица для связи кандидатов и желаемых должностей
        Schema::create('candidate_desired_position', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('desired_position_id');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('desired_position_id')->references('id')->on('desired_positions')->onDelete('cascade');
            $table->timestamps();
        });

        // Вспомогательная таблица для связи кандидатов и специализаций
        Schema::create('candidate_specialization', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('specialization_id');
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_specialization');
        Schema::dropIfExists('candidate_desired_position');
        Schema::dropIfExists('specializations');
        Schema::dropIfExists('desired_positions');
        Schema::dropIfExists('candidates');
    }
};
