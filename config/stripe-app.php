<?php

return [
    "secret_key"            => env("STRIPE_SECRET"),
    "publish_key"           => env("STRIPE_PUBLISH"),
    "confirmation_path"     => env("STRIPE_CONFIRMATION_ROUTE")
];
