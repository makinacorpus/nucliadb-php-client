# NucliaDB PHP Client.

Disclamer : This library still in development. It had been setup in order to develop some PHP CMS specific modules,
while keeping in common any possible part of code. At this state, the library implements only a small subset of the
web api calls. Feel free to PR unimplemented ones to make this lib grow up.

# Usage

## Initialize client API
```php
use Nuclia\ApiClient;

$token = '<your-nucliadb-token>';
$kbid = '<your-nucliadb-knoledgebox-id>';
$zone = '<your-nucliadb-zone>'; //Such as 'europe-1'

$apiClient = new ApiClient($zone, $token, $kbid);
```
## Using search API
The search API aims to reflect [NucliaDB search web API](https://docs.nuclia.dev/docs/api#tag/Search)
### Create a search API instance
```php
$searchApi = $apiClient->createSearchApi();
```
### Run a simple full text search
```php
$response = $searchApi->search('you+shall+not+pass');
```
`$response` returns an instance of [Symfony HTTP Client response](https://symfony.com/doc/current/http_client.html#basic-usage)

## Using resources API
The resources API aims to reflect [NucliaDB resources web API](https://docs.nuclia.dev/docs/api#tag/Resources)
### Create a resource API instance
```php
$resourcesApi = $apiClient->createResourcesApi();
```
### Get resource.
```php
$rid = '<resource-id>'
$response = $resourcesApi->getResource($rid,EnumArray::show([ShowEnum::VALUES, ShowEnum::BASIC]));
```
### Create resource.
```php
$response = $resourcesApi->createResource([
  'title' =>  'The Fellowship of the Ring',
  'links' => [
    'link-1' => [
      'uri' => 'https://en.wikipedia.org/wiki/The_Lord_of_the_Rings:_The_Fellowship_of_the_Ring'
    ]
  ]
]);
```
### Update resource.
```php
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
```
### Delete resource.
```php
$rid = '<resource-id>'
$resourcesApi->deleteResource($rid);
```

## Using resource fields API
The resource fields API aims to reflect [NucliaDB resource fields web API](https://docs.nuclia.dev/docs/api#tag/Resource-fields)
### Create a resource fields API instance
```php
$resourceFieldsApi = $apiClient->createResourceFieldsApi();
```
### Upload a binary File as a resource field
```php
$body = file_get_contents('The-Fellowship-Of-The-Ring.jpg', 'r');
$rid = '<resource-id>'
$fieldId = '<field-id>' // A free string used to identify your file field in resource.

$response = $resourceFieldsApi->uploadBinaryFile($rid,$fieldId, $body);
```

