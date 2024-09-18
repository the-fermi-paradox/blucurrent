<?php
declare(strict_types=1);
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

abstract class JsonSeeder extends Seeder
{
    protected string $filePath;
    protected string $modelClass;
    protected string $objectName;
    public function run(): void
    {
        $file = Storage::disk('local')->get($this->filePath);
        // Since this runs only when seeding, we just want the program to crash when it fails
        $json = json_decode($file, true, 512, JSON_THROW_ON_ERROR)[$this->objectName];
        foreach ($json as $element) {
            $model = new $this->modelClass;
            foreach ($element as $key => $value) {
                $model->setAttribute($key, $value);
            }
            $model->saveOrFail();
        }
    }
}
