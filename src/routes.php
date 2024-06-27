<?php

Route::get(config('instagram-feed.auth_callback_route'), 'Code16\InstagramFeed\AccessTokenController@handleRedirect');