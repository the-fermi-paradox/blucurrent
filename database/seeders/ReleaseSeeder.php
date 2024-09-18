<?php
declare(strict_types=1);
namespace Database\Seeders;

use database\seeders\JsonSeeder;

class ReleaseSeeder extends JsonSeeder
{
    protected string $filePath = 'data/releases.json';
    protected string $modelClass = Release::class;
    protected string $objectName = 'releases';
}
