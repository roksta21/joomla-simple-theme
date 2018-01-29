<jdoc:include type="head" />
 <!--[if lte IE 8]><link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/ie/ie.css" type="text/css" /><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/styles.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/normalize.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/theme.css" type="text/css" />

<!-- Google Analytics -->
<?php if ($this->params->get( 'analyticsdisable' )) : ?>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/modules/analytics.js"></script>
<?php endif; ?>

<!-- Back to top -->
<?php if ($this->params->get( 'jscroll' )) : ?> 
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/modules/jscroll.js"></script>
<?php endif; ?>

<!-- Responsive Menu -->
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/modules/jquery.slicknav.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() { 
		jQuery('#nav').slicknav();

		jQuery('.blog .items-row .item').each(function(i, el) { jQuery(el).slimScroll({ height: '500px'}) });
	});
</script>	

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 


