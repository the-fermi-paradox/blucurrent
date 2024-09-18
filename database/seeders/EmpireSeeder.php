<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Empire;
class EmpireSeeder extends JsonSeeder
{
    protected string $filePath = 'data/empires.json';
    protected string $modelClass = Empire::class;
    protected string $objectName = 'civilizations';
}
