<?php
declare(strict_types=1);
namespace Database\Seeders;
use App\Models\Release;

class ReleaseSeeder extends JsonSeeder
{
    protected string $filePath = 'releases.json';
    protected string $modelClass = Release::class;
    protected string $objectName = 'releases';
}
