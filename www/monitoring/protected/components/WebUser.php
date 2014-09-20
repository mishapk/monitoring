<?php
class WebUser extends CWebUser {
    private $_model = null;
 
    function getRole() {
        if($user = $this->getModel()){
            // в таблице User есть поле role
            return $user->role;
        }
    }
    
 
   
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }
   function getEID(){
              $num= Yii::app()->user->getid();
              $id=User::model()->find('id=:num',array(':num'=>$num));
              return $id->enterprise_id;
         }
     function getOID(){
              $num= $this->getEID();
              if($num>0){
              $id=Object::model()->find('id_enterprise=:num',array(':num'=>$num));
              return $id->id;
		  }else return 0;
         }  
          function getSID(){
         /*     $num= $this->getOID();
              if($num>0){
              $id=Sensor::model()->find('id_object=:num',array(':num'=>$num));
              return $id->id;
		  }else return 0;
		  */
		   $num= $this->getOID();
		   $criteria=new CDbCriteria();
		   $criteria->with= array('enterprise');
		   $criteria->compare('enterprise.id',$num);
		   
           $id=Sensor::model()->find($criteria);
           
              return $id->title;
         }         
    
    
}
?>
