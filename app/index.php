<?php

require 'vendor/craft/bundle.php';

// create app
$app = new craft\web\App([
    '/'         => 'my\logic\Front::hello',
    '/lost'     => 'my\logic\Error::lost',
    '/sorry'    => 'my\logic\Error::sorry'
]);

// listen 404 event
$app->on(404, function() use($app) {
    $app->plug('/lost');
});

// listen 403 event
$app->on(403, function() use($app) {
    $app->plug('/sorry');
});

// plug & wait
$app->plug();