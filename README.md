# NucliaDB PHP Client.

Disclamer : This library still in development. It had been setup in order to develop some PHP CMS specific modules,
while keeping in common any possible part of code. At this state, the library implements only a small subset of whe
web api calls. Feel free to PR unimplemented ones.

# Usage

## Initialize client API
```php
$token = '<your-nucliadb-token>';
$kbid = '<your-nucliadb-knoledgebox-id>';
$zone = '<your-nucliadb-zone>'; //Such as 'europe-1'
$apiClient = new ApiClient($zone, $token, $kbid);
```

## Using resources API
The resources API aims to reflect [NucliaDB resources web API](https://docs.nuclia.dev/docs/api#tag/Resources)
```php
$resourcesApi = $apiClient->createResourcesApi();

// Get resource.
$rid = '<resource-id>'
$response = $resourcesApi->getResource($rid,EnumArray::show([ShowEnum::VALUES, ShowEnum::BASIC]));
$response->getContent();

// Create resource.
$response = $resourcesApi->createResource([
  'title' =>  'The Fellowship of the Ring',
  'links' => [
    'link-1' => [
      'uri' => 'https://en.wikipedia.org/wiki/The_Lord_of_the_Rings:_The_Fellowship_of_the_Ring'
    ]
  ]
]);
$response->getContent());

//Update resource
$rid = '<resource-id>'
$response = $resourcesApi->modifyResource(
  $rid,
  [
  'title' =>  'The Fellowship of the Ring (Updated)',
  'links' => [
    'link-1' => [
      'uri' => 'https://www.rottentomatoes.com/m/the_lord_of_the_rings_the_fellowship_of_the_ring'
    ]
  ]
]);
$response->getContent();

// Delete resource
$rid = '<resource-id>'
$resourcesApi->deleteResource($rid);
```
## Using search
The search API aims to reflect [NucliaDB search web API](https://docs.nuclia.dev/docs/api#tag/Search)
```php
$response = $searchApi->search('you+shall+not+pass');
```


