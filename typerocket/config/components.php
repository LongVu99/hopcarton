<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Component Registry
    |--------------------------------------------------------------------------
    */
    'registry' => [
       'banner' => \App\Components\BannerComponent::class,
       'ceo' => \App\Components\CeoComponent::class,
       'boxbanner' => \App\Components\BoxBannerComponent::class,
       'space' => \App\Components\SpaceComponent::class,
       'business' => \App\Components\BusinessComponent::class,
       'operatingtime' => \App\Components\OperatingTimeComponent::class,
       'mission' => \App\Components\MissionComponent::class,
       'commit' => \App\Components\CommitComponent::class,
       'category' => \App\Components\CategoryComponent::class,
       'design' => \App\Components\DesignComponent::class,
       'bestseller' => \App\Components\BestSellerComponent::class,
       'featuredproduct' => \App\Components\FeaturedProductComponent::class,
       'library' => \App\Components\LibraryComponent::class,
       'story' => \App\Components\StoryComponent::class,


       'contact' => \App\Components\ContactComponent::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Builder
    |--------------------------------------------------------------------------
    |
    | List of components you want included for the builder group.
    |
    */
    'builder' => [
       'banner',
       'ceo',
       'boxbanner',
       'space',
       'business',
       'operatingtime',
       'commit',
       'category',
       'design',
       'bestseller',
       'featuredproduct',
       'library',
       'story',


       'contact',
    ]
];