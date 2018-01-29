<?php /**  * @copyright	2018 - All Rights Reserved. **/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
JLoader::import('joomla.filesystem.file');
JHtml::_('behavior.framework', true);
JHtml::_('bootstrap.framework');
$document = JFactory::getDocument();

$logo = $this->params->get('logo');
$site_title = $this->params->get('site_title');
$analyticsdisable = $this->params->get("analyticsdisable");
$googleanalytics = $this->params->get("googleanalytics");
$jscroll = $this->params->get("jscroll");

$app = JFactory::getApplication(); 
$menu = $app->getMenu(); 
$lang = JFactory::getLanguage(); 

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<?php require(dirname(__FILE__)."/modules/req_css.php");?>
	<?php require(dirname(__FILE__)."/functions.php");?>
</head>
<body class="background">
	<div id="header-w">
		<div id="header">
			<div class="logo-container">
				<?php if ($logo != null ) : ?>
					<div class="logo">
						<a href="<?php echo $this->baseurl ?>">
							<img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>" alt="logo" />
						</a>
					</div>
				<?php else : ?>
					<?php if ($site_title != null) : ?>
						<div class="logo">
							<a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($site_title);?></a>
						</div>
					<?php else : ?>
						<div class="logo">
							<a href="<?php echo $this->baseurl ?>/">
								<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/logo.png" alt="logo" >
							</a>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div> <!-- end logo container -->
			<nav class="clearfix">
				<div id="nav">
					<jdoc:include type="modules" name="mainmenu" style="none" />
				</div>
			</nav>
		</div> <!-- end header -->
	</div><!-- end header-w -->	

	 <!-- Slideshow -->
	<?php
		if ($menu->getActive() == $menu->getDefault($lang->getTag())) : ?>
			<?php if($this->countModules('slider')) : ?>
				<div id="firstbox">
					<center>
						<jdoc:include type="modules" name="slider" style="xhtml" />
					</center>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	<!-- END Slideshow -->	
			
	<div class="container-fluid" id="relative">   
		<div id="wrapper-w">
			<div id="wrapper">
				<?php if ($menu->getActive() == $menu->getDefault($lang->getTag())) : ?>
					<?php if($this->countModules('top1') or $this->countModules('top2') or $this->countModules('top3')) : ?>
						<div id="top" class="clearfix">
							<div class="top1 hvr-push"><jdoc:include type="modules" name="top1" style="xhtml" /></div>
							<div class="top2 hvr-push"><jdoc:include type="modules" name="top2" style="xhtml" /></div>
							<div class="top3 hvr-push"><jdoc:include type="modules" name="top3" style="xhtml" /></div>			
						</div>
					<?php endif; ?>
				<?php endif; ?>	

				<div id="main-content">	
					<?php 
						if($this->countModules('left') xor $this->countModules('right')) $maincol_sufix = '_one';
						elseif(!$this->countModules('left') and !$this->countModules('right'))$maincol_sufix = '_none';
						else $maincol_sufix = '_both'; 
					?>
					<!-- Left Sidebar -->		  
					<?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
						<div id="leftbar-w">
							<div id="sidebar">
								<jdoc:include type="modules" name="left" style="hq" />
							</div>
						</div>
					<?php endif; ?>	  

					<!-- Center -->	
					<div id="centercontent<?php echo $maincol_sufix; ?>">
						<div class="clearpad">
							<jdoc:include type="component" />
						</div>	
						<?php if ($this->countModules('breadcrumb')) : ?>
							<jdoc:include type="modules" name="breadcrumb"  style="none"/>
						<?php endif; ?>
					</div>		
	
					<!-- Right Sidebar -->
					<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
						<div id="rightbar-w">
							<div id="sidebar">
								<jdoc:include type="modules" name="right" style="hq" />
							</div>
						</div>
					<?php endif; ?>	

					<div class="clr"></div>
				</div> 

				<!-- TABS -->
				<div id="box">
					<jdoc:include type="modules" name="position-0" style="hq" />
					<div id="right">
						<?php if ($this->countModules('newsflash')) : ?>
							<jdoc:include type="modules" name="newsflash" style="xhtml" />
						<?php endif; ?>
					</div> 

					<?php if (($this->countModules('tab1')) || ($this->countModules('tab2')) || ($this->countModules('tab3'))) :?>
						<div class="tabs" id="left">
							<?php if ($this->countModules('tab1')) : ?>
							       <div class="tab">
										<input id="tab-4" name="tab-group-2" checked="checked" type="radio">
										<label for="tab-4">Our Mission</label>
										<div class="content">
											<jdoc:include type="modules" name="tab1" style="xhtml" />
										</div> 
							       </div>
							<?php endif; ?>
							<?php if ($this->countModules('tab2')) : ?>		
							       <div class="tab">
							            <input id="tab-5" name="tab-group-2" type="radio">
							            <label for="tab-5">Our Vission</label>
							            <div class="content"><jdoc:include type="modules" name="tab2" style="xhtml" /></div> 
							       </div>
							<?php endif; ?>
							<?php if ($this->countModules('tab3')) : ?>			
							        <div class="tab">
							            <input id="tab-6" name="tab-group-2" type="radio">
							            <label for="tab-6">Our Commitment</label>
							            <div class="content"><jdoc:include type="modules" name="tab3" style="xhtml" /></div> 
							       </div>
							<?php endif; ?> 	   
						</div>
					<?php endif; ?>   
				</div> <!-- END TABS -->	
			</div><!-- wrapper end -->

			<?php if ($this->countModules('bottom')): ?>
				<jdoc:include type="modules" name="bottom" style="xhtml" />
			<?php endif; ?>

			<!-- Start bottomwide -->
			<div id="bottomwide">
				<div id="bottom" class="clearfix">
					<div class="user1">
						<jdoc:include type="modules" name="user1" style="xhtml" />
					</div>
					<div class="user2">
						<jdoc:include type="modules" name="user2" style="xhtml" />
					</div>
					<div class="user2">
						<jdoc:include type="modules" name="user3" style="xhtml" />
					</div>
				</div>
				<div class="copyright">
					<p style="float: left;">Copyright Epic Business Tours Limited | <?php echo date('Y');?>.</p> 
					<p style="float: right;">Built by @sam_roksta</p>
				</div>			
				<div style="display:none;" class="nav_up" id="nav_up"></div>
			</div><!-- End bottomwide -->
		</div><!-- End wrapper-w -->
	</div><!--/.fluid-container -->

</body>
</html>