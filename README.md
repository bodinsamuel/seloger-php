SeLoger.com-PHP
===============

Unofficial PHP library to connect to seloger.com api

Example
=======
Search
------
```php
// Create new class
$search = new Seloger\Search();

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

Other
-----
```php
// Create class
$request = new Seloger\Request();


// Number of post
$request->type = 'nbAnnoncesTotal';
$results = $request->run();


// Detail of a post
$request->type = 'annonceDetail';
$request->setParams('idAnnonce', 123456);
$results = $request->run();
```


Api Details
===========
Look at [Api.md](API.md)
