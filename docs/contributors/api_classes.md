# API Classes

`Api/` directory contain classes aiming to reflect [NucliaDB's web-api structure](https://docs.nuclia.dev/docs/api).

| Classes currently implemented  | Web API related section                                                 |
|--------------------------------|-------------------------------------------------------------------------|
| `Nuclia\Api\SearchAPI`         | [Search](https://docs.nuclia.dev/docs/api#tag/Search)                   |
| `Nuclia\Api\ResourcesApi`      | [Resources](https://docs.nuclia.dev/docs/api#tag/Resources)             |
| `Nuclia\Api\ResourceFieldsApi` | [Resource fields](https://docs.nuclia.dev/docs/api#tag/Resource-fields) |

  Those classes implement NucliaDB web API calls in related sections.
  For instance `ResourcesApi` class implements :

 | php Method       | Related web API call                                                                                          |
|------------------|---------------------------------------------------------------------------------------------------------------|
 | `getResource`    | [Get Resource](https://docs.nuclia.dev/docs/api#operation/Get_Resource_kb__kbid__resource__rid__get)          |
 | `createResource` | [Create Resource](https://docs.nuclia.dev/docs/api#operation/Create_Resource_kb__kbid__resources_post)        |
 | `deleteResource` | [Delete Resource](https://docs.nuclia.dev/docs/api#operation/Delete_Resource_kb__kbid__resource__rid__delete) |
 | `modifyResource` | [Modify Resource](https://docs.nuclia.dev/docs/api#operation/Modify_Resource_kb__kbid__resource__rid__patch)  |

Note that for now :
 * Only a subset of web API sections have a corresponding class
 * Implemented classes have only a subset of web API calls implemented as function
 * Implemented function have only a subset of parameters supported.

Feel free to extend this library and to submit PR.
