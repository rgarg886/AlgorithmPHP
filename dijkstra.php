<?php

$INT_MAX = 0x7FFFFFF;

function minimumDistance($distance, $shortestPathTreeSet, $verticesCount){

  global $INT_MAX;
  $min = $INT_MAX;
  $minIndex = 0;

  for($v = 0; $v < $verticesCount; $v++){

    if($shortestPathTreeSet[$v] == false && $distance[$v] <= $min){

      $min = $distance[$v];
      $minIndex = $v;

    }

  }

  return $minIndex;

}

function printResult($distance, $verticesCount){

  echo "<pre>" . "Vertex         Distance from source" . "</pre>";

  for($i = 0; $i < $verticesCount; ++$i)
    echo "<pre>". $i . "\t  \t \t " . $distance[$i] . "</pre>";

}

function dijkstra($graph, $source, $verticesCount){

  global $INT_MAX;
  $distance = array();
  $shortestPathTreeSet = array();

  for($i = 0; $i < $verticesCount; ++$i){

    $distance[$i] = $INT_MAX;
    $shortestPathTreeSet[$i] = false;

  }

  $distance[$source] = 0;

  for($count = 0; $count < $verticesCount - 1; ++$count){

    $u = minimumDistance($distance, $shortestPathTreeSet, $verticesCount);

    $shortestPathTreeSet[$u] = true;

    for($v = 0; $v < $verticesCount; ++$v){

      if(!$shortestPathTreeSet[$v] && $graph[$u][$v] && $distance[$u] != $INT_MAX && $distance[$u] + $graph[$u][$v] < $distance[$v]){

        $distance[$v] = $distance[$u] + $graph[$u][$v];

      }

    }

  }
  printResult($distance, $verticesCount);

}



#runner code



$graph = array(
	array(0, 4, 0, 0, 0, 0, 0, 8, 0),
	array(4, 0, 8, 0, 0, 0, 0, 11, 0),
	array(0, 8, 0, 7, 0, 4, 0, 0, 2),
	array(0, 0, 7, 0, 9, 14, 0, 0, 0),
	array(0, 0, 0, 9, 0, 10, 0, 0, 0),
	array(0, 0, 4, 0, 10, 0, 2, 0, 0),
	array(0, 0, 0, 14, 0, 2, 0, 1, 6),
	array(8, 11, 0, 0, 0, 0, 1, 0, 7),
	array(0, 0, 2, 0, 0, 0, 6, 7, 0)
);

dijkstra($graph, 0, 9);

?>
