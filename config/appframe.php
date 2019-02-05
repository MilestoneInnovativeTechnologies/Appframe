<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Brand Image
    |--------------------------------------------------------------------------
    |
    | An image url to be displayed on top left corner.
    | NULL or Absolute Url or Relative Url to domain root is only accepted
    | If image, maximum height should be 32 pixels
    |
    */

    'brand' => null,

    /*
    |--------------------------------------------------------------------------
    | Brand Text
    |--------------------------------------------------------------------------
    |
    | Text to be displayed on top left corner.
    | If brand is not NULL(any url given), then this text will be used as Alternate Text to the image
    |
    */

    'brand_text' => '',

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | HTML > HEAD > Title
    |
    */

    'title' => 'Application framework',

    /*
    |--------------------------------------------------------------------------
    | Favicon Url
    |--------------------------------------------------------------------------
    |
    | Url to the favicon to be set as page icon
    | Tip: Should be transparent (png) and 32x32 size
    | NULL or Absolute Url or Relative Url to domain root is only accepted
    |
    */

    'favicon_url' => 'https://png.icons8.com/office/2x/minecraft-logo.png',

    /*
    |--------------------------------------------------------------------------
    | Page Description
    |--------------------------------------------------------------------------
    |
    | HTML HEAD meta description
    |
    */

    'page_description' => '',

    /*
    |--------------------------------------------------------------------------
    | Root Path
    |--------------------------------------------------------------------------
    |
    | The path to which the application installed.
    | If installed to root, no need to update
    | Else give the path
    |
    */

    'root_path' => '',

    /*
    |--------------------------------------------------------------------------
    | Index Route
    |--------------------------------------------------------------------------
    |
    | The route name to redirect to show index page/welcome page.
    | If no any route name mention, default Appframe root route
    | will be used
    |
    */

    'index_route' => 'root',

    /*
    |--------------------------------------------------------------------------
    | LoggedOut Route
    |--------------------------------------------------------------------------
    |
    | The route name to redirect to after logging out.
    | If no any route name mention, default Appframe login route
    | will be used
    |
    */

    'logged_out_route' => 'login',
];
