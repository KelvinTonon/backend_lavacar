<?php

Schema::create('agendamentos', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id'); 
    $table->string('descricao'); 
    $table->date('data');
    $table->time('hora');
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});

