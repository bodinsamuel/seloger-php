SeLoger.com-PHP
===============

Unofficial PHP library to connect to seloger.com api

Example
=======
```php
// Create new class
$seloger = new SeLoger();

// Get request of type: Search
$search = $seloger->type('search');

// Apply custom options
$search->type('rent');
$search->order('date_desc');
$search->property('appartement');
$search->zipcode(['750115']);
$search->price(800, 2500);

// Additionnal
$search->si('elevator', TRUE);

// Get results
$results = $search->run();
```


Api Details
===========
Look at [Api.md](API.md)
