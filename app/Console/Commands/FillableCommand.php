<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class FillableCommand extends Command
{
    protected $signature = 'make:fillable {model} {fillable*}';

    protected $description = 'Add fillable attributes to a model';

    public function handle()
    {
        $model = $this->argument('model');
        $fillableAttributes = $this->argument('fillable');

        $modelFilePath = app_path($model . '.php');

        if (!File::exists($modelFilePath)) {
            $this->error('Model file does not exist.');
            return;
        }

        $modelContent = File::get($modelFilePath);
        $fillableString = implode("','", $fillableAttributes);

        $fillableAttributesCode = "\n    protected \$fillable = ['{$fillableString}'];\n";
        $updatedModelContent = str_replace('    protected $guarded = [];', $fillableAttributesCode, $modelContent);

        File::put($modelFilePath, $updatedModelContent);

        $this->info('Fillable attributes added to the model successfully.');
    }
}
?>
