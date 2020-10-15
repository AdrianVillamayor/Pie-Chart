# Pie Chart

Generates a chart pie/donut format in css and html vanilla
 
## Installation


```php

 require_once 'pieGenerator.php';

```

## Usage

```php
/**
  * Generates a chart pie/donut format in css and html vanilla
  *
  * @param array  $percentages Percentages to generate the chart (the sum has to be 100)
  * @param array  $colors      Array of colors that will split the chart
  * @param string $type        Type of chart (default 'pie')
  * 
  * return null/string
*/

  $percentages = array(11, 10, 61, 14, 4);
  $colors      = array('#007bff', '#e83e8c', '#fd7e14', '#28a745', '#17a2b8');
  $pie         = pieGenerator($percentages, $colors);

```
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Acknowledgments

![Example Pie](https://image.ibb.co/dKkZsp/Captura_de_pantalla_2018_08_27_a_las_17_55_33.png)

![Example Donut](https://image.ibb.co/cbcdk9/Captura_de_pantalla_2018_08_27_a_las_17_49_34.png)

## License
[MIT](https://github.com/AdrianVillamayor/Pie-Chart-PHP/blob/master/LICENSE)
