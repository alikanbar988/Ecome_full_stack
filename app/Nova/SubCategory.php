<?php

namespace App\Nova;

use App\Models\Category;
use Laravel\Nova\Fields\Url;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class SubCategory extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\SubCategory>
     */
    public static $model = \App\Models\SubCategory::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'category_name',
        'subcategory_name',
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Subcategory Name', 'subcategory_name')
            ->sortable()
            ->rules('required', 'max:255'),

             BelongsTo::make('Category'),
    
    // Add any other fields you need for the subcategory
    // For example, if you have a description field:
    // Textarea::make('Description')->rules('required'),
    
    // Example of a category name field

    // Image::make('Category Image', 'category_image')
    //     ->disk('public')
    //     ->disableDownload()
    //     ->path('category')
    //     ->rules('required')
    //     ->help('Upload the category image'),

   // Trix::make('Description')->alwaysShow(),

   /// Url::make('Location', 'location')
      //  ->displayUsing(function ($value) {    
      //      return $value ? "<a href='{$value}' target='_blank'>View Location</a>" : 'No location provided';
      //  })->asHtml(),

  //  File::make('pdf')
    //    ->path('pdfs'),


                
    
        // Add any other fields you need for the subcategory
        ];
    }

    /**
     * Get the cards available for the resource.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array<int, \Laravel\Nova\Filters\Filter>
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array<int, \Laravel\Nova\Lenses\Lens>
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array<int, \Laravel\Nova\Actions\Action>
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
