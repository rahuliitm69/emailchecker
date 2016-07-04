<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('Balkanbook');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
<?php
// header('Content-Type: text/html; charset=UTF-8');
?>

 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php  
// echo $this->Html->meta('png', $this->Html->url('/images/fav_icon.png'));
// echo $this->Html->meta('icon', $this->Html->url('/images/fav_icon.ico'));

?> 

<title>Email Checker</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
 <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'> -->
 	<?php
                /** BEGIN GLOBAL MANDATORY STYLES  **/

	            echo $this->Html->css('bootstrap.min.css');
                echo $this->Html->css('font-awesome.min.css');
                echo $this->Html->css('simple-line-icons.min.css');
                echo $this->Html->css('uniform.default.min.css');

                /** BEGIN THEME STYLES **/
                
                echo $this->Html->css('components-md.css');
                echo $this->Html->css('plugins-md.css');
                echo $this->Html->css('layout.css');
                echo $this->Html->css('custom.css');
          
                echo $this->fetch('meta');
               
                /** BEGIN CORE PLUGINS  **/
                echo $this->Html->script('jquery.min.js');
                echo $this->Html->script('jquery-migrate.min.js');
                echo $this->Html->script('bootstrap.min.js');
                echo $this->Html->script('jquery.blockui.min.js');
                echo $this->Html->script('jquery.uniform.min.js');
                echo $this->Html->script('jquery.cokie.min.js');
                 
                /** END CORE PLUGINS **/   

                /** BEGIN JAVASCRIPTS **/

                echo $this->Html->script('bjqs-1.3.js');
                echo $this->Html->script('bootstrap_calendar.js');
                echo $this->Html->script('bootstrap-datetimepicker.js');
                echo $this->Html->script('jquery.validate.min.js');
	?>
</head>
	<?php $admin = $this->Session->read('admin'); ?>
        <?php 
                if(empty($admin)){
                 echo $this->element('default_header');
                }else{
                 echo $this->element('main_header');
                }
        ?>
        <?php 
               if(!empty($admin)){
                  echo $this->element('admin_sidebar');
                }
        ?>

        <?php
        	 if(isset($page) AND $page == 'view') { echo $this->element('admin_banner'); }
        	 else
        	 {
        	  echo $this->fetch('content'); 	
        	 }
	 ?>
    
<?php echo $this->element('default_footer'); ?>  
  

</body>
</html>
