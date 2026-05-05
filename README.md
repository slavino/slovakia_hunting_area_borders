# Hunting Area borders in Slovakia

As source used open data from Slovak government 
* [2024](https://data.slovensko.sk/datasety/71b1cc58-83df-45ba-8f4c-b77112c6e4cb)
* [2025](https://data.slovensko.sk/datasety/28b9ad6e-8eee-4e75-b849-3de422cb01a2)

and source of data is [© NLC Zvolen](https://web.nlcsk.org/).

Ideal for example in [Leaflet](https://leafletjs.com/) or [OsmAnd](https://osmand.net/) embedded in Android.

## Parse from CLI

```
#!/bin/bash
mkdir SR_PR_2025
php -d memory_limit=-1 parse.php
```
## How to get GEOJSON

### Example parsed single hunting area
belonging to data of *2025*, division "SXI" and called "Olsava" 


Nice Github pages [Olšava](https://github.com/slavino/slovakia_hunting_area_borders/blob/main/SR_PR_2025/SXI_1557_PR_2025.568_Olsava.geojson) , [Nobiš](https://github.com/slavino/slovakia_hunting_area_borders/blob/main/SR_PR_2025/SXI_2611_PR_2025.949_Nobis.geojson)


RAW GeoJson data link examples:


- https://raw.githubusercontent.com/slavino/slovakia_hunting_area_borders/refs/heads/main/SR_PR_2025/SXI_1557_PR_2025.568_Olsava.geojson
- https://raw.githubusercontent.com/slavino/slovakia_hunting_area_borders/refs/heads/main/SR_PR_2025/SXI_2611_PR_2025.949_Nobis.geojson
