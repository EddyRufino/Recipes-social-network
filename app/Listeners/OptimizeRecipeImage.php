<?php

namespace App\Listeners;

use App\Events\RecipeSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OptimizeRecipeImage implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $image = Image::make(Storage::get($event->recipe->image))
            ->widen(800)
            ->limitColors(255)
            ->encode();

        // dd($image);

        Storage::put($event->recipe->image, (string) $image);
    }
}
