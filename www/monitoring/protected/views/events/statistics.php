<?php
$this->menu=array(
	
        array('label'=>'List Events', 'url'=>array('index')),
	array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>
<h1>Statistics</h1>
<?php

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart' =>array('type'=>'column'), 
      'title' => array('text' => 'Events Statistics 2014'),
      'xAxis' => array(
         
          'categories'=>array (
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            )
      ),
      'yAxis' => array(
         'title' => array('text' => 'Count')
      ),
       'plotOptions'=>array('column'=>array('stacking'=> 'normal')),
      'series' => array(
        array('name' => 'Level I', 'data' =>$mass[1],'stack'=>'NI','color'=>'orange'),
        array('name' => 'Level II', 'data' => $mass[2],'stack'=>'NI','color'=>'red'),
        array('name' => 'Normal', 'data' => $mass[4],'stack'=>'TI','color'=>'green'), 
        array('name' => 'Troubles', 'data' => $mass[3],'stack'=>'NI','color'=>'gray'),
        array('type'=>'line','name' => 'TestInterval', 'data' => $mass[0],'stack'=>'NI','color'=>'blue'),  
        array('type'=>'line','name' => 'StartSystem', 'data' => $mass[5],'color'=>'black')  
     )
   )
));

//echo'<pre>';
//print_r($mass);
//echo'</pre>';
?>
