<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Panel;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\NovaRequest;

class SentMail extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = MahiMahi\EmailLog\Models\SentMail::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'subject';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'subject',
        'to'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            DateTime::make('Created At')->sortable(),
            new Panel('Sender', [
                Text::make('From'),
                Text::make('Reply To')->hideFromIndex(),
            ]),
            new Panel('Recipient', [
                Text::make('To')->sortable(),
                Text::make('Cc')->hideFromIndex(),
                Text::make('Bcc')->hideFromIndex(),
            ]),
            new Panel('Content', [
                Text::make('Subject')->sortable(),
                Trix::make('Html')->hideFromIndex()->alwaysShow(),
                Code::make('Raw')->hideFromIndex(),
            ])
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
