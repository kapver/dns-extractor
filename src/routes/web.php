<?php

use Illuminate\Support\Facades\Route;
use Kdg\DnsExtractor\Controllers\DnsExtractorController;

Route::get('dns_extract/{hostname}', DnsExtractorController::class);
