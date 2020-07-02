<?php

$INF = 99999;

function printResult($distance, $verticesCount){

  global $INF;

  echo "<pre>" . "Shortest distances between every pair of vertices: ". "<br/>";

  for($i = 0; $i < $verticesCount; ++$i){

    for($j = 0; $j < $verticesCount; ++$j){

      if($distance[$i][$j] == $INF)
        echo str_pad("INF",7);
      else
        echo str_pad($distance[$i][$j], 7);

    }

    echo "<br/>";

  }

  echo "</pre>";

}

function floydWarshall($graph, $verticesCount){

  $distance = array();

  for($i = 0; $i < $verticesCount; ++$i)
    for($j = 0; $j < $verticesCount; ++$j)
      $distance[$i][$j] = $graph[$i][$j];

  for($k = 0; $k < $verticesCount; ++$k){

    for($i = 0; $i < $verticesCount; ++$i){

      for($j = 0; $j < $verticesCount; ++$j){

        if($distance[$i][$k] + $distance[$k][$j] < $distance[$i][$j])
          $distance[$i][$j] = $distance[$i][$k] + $distance[$k][$j];

      }

    }

  }

  printResult($distance, $verticesCount);

}

//runner code

$graph = array(
	array(0, 5, $INF, 10),
	array($INF, 0, 3, $INF),
	array($INF, $INF, 0, 1),
	array($INF, $INF, $INF, 0)
);

floydWarshall($graph, 4);

 ?>
