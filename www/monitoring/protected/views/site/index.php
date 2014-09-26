<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>
<?php 
echo 'hash=',CPasswordHelper::hashPassword('admin'),'<br>';  
$num= Yii::app()->user->getid();
  echo 'Num=',$num;
  $id=User::model()->find('id=:num',array(':num'=>$num));
 // echo'<br> id=', $id->enterprise_id;
 echo '<br>';
 $num= 5;
		   $criteria=new CDbCriteria();
		   $criteria->compare('t.id',$num); 
           $id=Sensor::model()->find($criteria);
           
           echo "<pre>";print_r($id->getAttributes());echo"</pre>";
		echo 'enterprise->id',$id->enterprise->id;
echo  '<br>IP=',   Yii::app()->request->getUserHostAddress(); // ip
 echo '<br>Agent=',Yii::app()->request->getUserAgent(); // user-agent
 echo  '<br>Host=',Yii::app()->request->getUserHost(); // host name           
?>
<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
