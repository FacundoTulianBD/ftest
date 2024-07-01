<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tipo')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('version')->nullable();
            $table->string('moneda')->nullable();
            $table->string('0km')->nullable();
            // $table->bigInteger('2025')->nullable();
            // $table->bigInteger('2024')->nullable();
            $table->bigInteger('2023')->nullable();
            $table->bigInteger('2022')->nullable();
            $table->bigInteger('2021')->nullable();
            $table->bigInteger('2020')->nullable();
            $table->bigInteger('2019')->nullable();
            $table->bigInteger('2018')->nullable();
            $table->bigInteger('2017')->nullable();
            $table->bigInteger('2016')->nullable();
            $table->bigInteger('2015')->nullable();
            $table->bigInteger('2014')->nullable();
            $table->bigInteger('2013')->nullable();
            $table->bigInteger('2012')->nullable();
            $table->bigInteger('2011')->nullable();
            $table->bigInteger('2010')->nullable();
            $table->bigInteger('2009')->nullable();
            $table->bigInteger('2008')->nullable();
            $table->bigInteger('2007')->nullable();
            $table->bigInteger('2006')->nullable();
            $table->bigInteger('2005')->nullable();
            $table->bigInteger('2004')->nullable();
            $table->bigInteger('2003')->nullable();
            $table->bigInteger('2002')->nullable();
            $table->bigInteger('2001')->nullable();
            $table->bigInteger('2000')->nullable();
            $table->bigInteger('1999')->nullable();
            $table->bigInteger('1998')->nullable();
            $table->bigInteger('1997')->nullable();
            $table->bigInteger('1996')->nullable();
            $table->bigInteger('1995')->nullable();
            // $table->bigInteger('anio_2025')->nullable();
            // $table->bigInteger('anio_2024')->nullable();
            // $table->bigInteger('anio_2023')->nullable();
            // $table->bigInteger('anio_2022')->nullable();
            // $table->bigInteger('anio_2021')->nullable();
            // $table->bigInteger('anio_2020')->nullable();
            // $table->bigInteger('anio_2019')->nullable();
            // $table->bigInteger('anio_2018')->nullable();
            // $table->bigInteger('anio_2017')->nullable();
            // $table->bigInteger('anio_2016')->nullable();
            // $table->bigInteger('anio_2015')->nullable();
            // $table->bigInteger('anio_2014')->nullable();
            // $table->bigInteger('anio_2013')->nullable();
            // $table->bigInteger('anio_2012')->nullable();
            // $table->bigInteger('anio_2011')->nullable();
            // $table->bigInteger('anio_2010')->nullable();
            // $table->bigInteger('anio_2009')->nullable();
            // $table->bigInteger('anio_2008')->nullable();
            // $table->bigInteger('anio_2007')->nullable();
            // $table->bigInteger('anio_2006')->nullable();
            // $table->bigInteger('anio_2005')->nullable();
            // $table->bigInteger('anio_2004')->nullable();
            // $table->bigInteger('anio_2003')->nullable();
            // $table->bigInteger('anio_2002')->nullable();
            // $table->bigInteger('anio_2001')->nullable();
            // $table->bigInteger('anio_2000')->nullable();
            // $table->bigInteger('anio_1999')->nullable();
            // $table->bigInteger('anio_1998')->nullable();
            // $table->bigInteger('anio_1997')->nullable();
            // $table->bigInteger('anio_1996')->nullable();
            // $table->bigInteger('anio_1995')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
