<?php
$default_url = '../../../data/tmp/tmp 15';
$tema = 'adminhero/';
$url = $default_url.'/'.$tema;
include '../../../include/all_include.php';
include '../../../include/function/session.php'; 
$judul = baca_database("","nama_aplikasi","select * from data_aplikasi")." ".baca_database("","objek","select * from data_aplikasi");
?>

    <link rel="stylesheet" href="<?php echo $url;?>https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <link id="mainstyle" rel="stylesheet" href="<?php echo $url;?>assets/stylesheets/theme-libs-plugins.css">
    <link id="mainstyle" rel="stylesheet" href="<?php echo $url;?>assets/stylesheets/skin.css">
    <link id="mainstyle" rel="stylesheet" href="<?php echo $url;?>assets/stylesheets/demo.css">
    <script src="<?php echo $url;?>assets/scripts/lib/modernizr-custom.js"></script>
    <script src="<?php echo $url;?>assets/scripts/lib/respond.js"></script>
  </head>

  <body class="orchid  ">

    <!-- #SIDEMENU-->
    <div class="mainmenu-block">
      <!-- SITE MAINMENU-->
      <nav class="menu-block">
        <ul class="nav">
          <li class="nav-item mainmenu-user-profile"><a href="index.php">
              <div class="circle-box"><img src="<?php echo $avatar; ?>" alt="">
                <div class="dot dot-success"></div>
              </div>
              <div class="menu-block-label"><b>Selamat Datang  </b><br><?php echo ucwords($siapa); ?></div></a></li>
        </ul>
        
        <ul class="nav">
		
		
		 <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
               
				<li class="nav-item"><a class="nav-link" href="<?php echo $i->l;?>">&nbsp;&nbsp;<i class="<?php echo $i->i;?>"></i>
              <div class="menu-block-label"><?php echo $i->n;?></div></a></li>
			  
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

				
				 <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#">&nbsp;&nbsp;<i class="<?php echo $i->i;?>"></i>
              <div class="menu-block-label"><?php echo $i->n;?></div></a>
            <ul class="nav menu-block-sub">
              <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                        <li>
                            <a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
                                <?php echo $i1->n;?></a>
                        </li>
                        <?php }} ?>
            </ul>
          </li>
		  
		  
				
               
                           
                  

            <!-- /MULTI -->
            <?php }} ?>
            <!-- /MENU -->
		
		
        </ul>
        <!-- END SITE MAINMENU-->
      </nav>
    </div>

    <!-- #MAIN-->
    <div class="main-wrapper">

	
			 <!-- VIEW WRAPPER-->
      <div class="view-wrapper">

        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">

          <!-- NAV FOR MOBILE-->
          <div class="topbar-wrapper-mobile-nav"><a class="topbar-togger js-minibar-toggler" href="#"><i class="icon ion-ios-arrow-back hidden-md-down"></i><i class="icon ion-navicon-round hidden-lg-up"></i></a><a class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler" href="#"><i class="icon ion-android-person"></i></a>

            
            <a class="topbar-wrapper-logo demo-logo" href="index.php"><?php echo ucwords($judul); ?></a>
          </div>
          <!-- END NAV FOR MOBILE-->

          <!-- SEARCH-->
         
          <!-- END SEARCH-->

          <!-- TOP RIGHT MENU-->
          <ul class="nav navbar-nav topbar-wrapper-nav">
          
         
           <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon ion-paintbucket"></i></a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="js-color-switcher demo-color-switcher">
                  <div class="dropdown-header">Flat</div>
                  <div class="list-inline"><a class="list-inline-item" href="#" data-color="f-dark">
                      <div class="demo-skin-grid f-dark"></div></a><a class="list-inline-item" href="#" data-color="f-dark-blue">
                      <div class="demo-skin-grid f-dark-blue"></div></a><a class="list-inline-item" href="#" data-color="f-blue">
                      <div class="demo-skin-grid f-blue"></div></a><a class="list-inline-item" href="#" data-color="f-green">
                      <div class="demo-skin-grid f-green"></div></a><a class="list-inline-item" href="#" data-color="f-deep-taupe">
                      <div class="demo-skin-grid f-deep-taupe"></div></a>
                  </div>
                  <div class="dropdown-header">Gradient</div>
                  <div class="list-inline"><a class="list-inline-item" href="#" data-color="orchid">
                      <div class="demo-skin-grid orchid"></div></a><a class="list-inline-item" href="#" data-color="cadetblue">
                      <div class="demo-skin-grid cadetblue"></div></a><a class="list-inline-item" href="#" data-color="joomla">
                      <div class="demo-skin-grid joomla"></div></a><a class="list-inline-item" href="#" data-color="influenza">
                      <div class="demo-skin-grid influenza"></div></a><a class="list-inline-item" href="#" data-color="moss">
                      <div class="demo-skin-grid moss"></div></a><a class="list-inline-item" href="#" data-color="mirage">
                      <div class="demo-skin-grid mirage"></div></a><a class="list-inline-item" href="#" data-color="stellar">
                      <div class="demo-skin-grid stellar"></div></a><a class="list-inline-item" href="#" data-color="servquick">
                      <div class="demo-skin-grid servquick"></div></a>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?php logout();?>"><i class="icon ion-android-exit"></i></a></li>
            <li class="nav-item"><a class="nav-link close-mobile-nav js-close-mobile-nav" href="<?php logout();?>"><i class="icon ion-close"></i></a></li>
            <!-- END TOP RIGHT MENU-->
          </ul>
        </div>
        <!--END TOP WRAPPER-->


        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Halaman<b>&nbsp;<?php tabelnomin(); ?></b></h4>
                  <div class="small text-muted"> <?php echo $judul; ?></div>
				
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right">
                <div class="small text-muted m-b-1"></div><span data-plugin="peityBar" data-peity="{ &quot;fill&quot;: [&quot;#ccc&quot;], &quot;width&quot;: 50 }">0,3,6,5,2,3,7,3,5,2</span>
              </div>
            </div>
			
			 <div class="col-md-12">
			<hr>
				  <br>
			<?php include 'halaman.php'; ?>           
			</div>
			
              
          </div>
        </div>

        <div class="container-fluid">
          <div class="row panel-wrapper js-grid-wrapper">
           
          
          
<center>           
            CopyRight © 2019 -  <?php echo $judul; ?>
        </center>          
                      

               
             
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->

      </div>
      <!-- END VIEW WAPPER-->
    

   
    <!-- END MAIN WRAPPER-->


    <!-- WEB PERLOAD-->
    <div id="preload">
      <ul class="loading">
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>



    <!-- Lib-->
    <script src="<?php echo $url;?>assets/scripts/lib/jquery-1.11.3.min.js"></script>
    <script src="<?php echo $url;?>assets/scripts/lib/jquery-ui.js"></script>
    <script src="<?php echo $url;?>assets/scripts/lib/tether.min.js"></script>

    <!-- Bootstrap js-->
    <!-- script(src="<?php echo $url;?>assets/bootstrap/js/bootstrap.min.js")-->

    <!-- Cookie js-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/js.cookie.js")-->

    <!-- Moment: Full featured date library for parsing, validating, manipulating, and formatting dates.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/moment.min.js")-->

    <!-- Fastclick: Polyfill to remove click delays on browsers with touch UIs.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/fastclick.js")-->

    <!-- Masonry: Grid layout library.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/masonry.pkgd.min.js")-->

    <!-- Peity: is a simple jQuery plugin that converts an element's content into a simple <svg>.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.peity.min.js")-->

    <!-- imagesloaded: Detect when images have been loaded.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/imagesloaded.pkgd.js")-->

    <!-- MatchHeight: A responsive equal heights-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.matchHeight.js")-->

    <!-- Select2: JQuery based replacement for select boxes-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/select2.full.min.js")-->

    <!-- jQuery multiselect: jQuery plugin which is a drop-in replacement for the standard <select> element-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.multi-select.js")-->

    <!-- Bootstrap-tagsinput: jQuery tags input plugin based on Twitter Bootstrap.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/bootstrap-tagsinput.js")-->

    <!-- Bootstrap-maxlength: Display the maximum lenght of the field-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/bootstrap-maxlength.min.js")-->

    <!-- Chartjs: Simple HTML5 Charts using the canvas element-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/Chart.min.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/Chart.config.js")-->

    <!-- Bootstrap-touchspin: A mobile and touch friendly input spinner component for Bootstrap 3.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.bootstrap-touchspin.min.js")-->

    <!-- Date Range Picker: A JavaScript component for choosing date ranges.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/daterangepicker.js")-->

    <!-- jquery.timepicker: A lightweight, customizable javascript timepicker plugin.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.timepicker.js")-->

    <!-- Bootstrap-submenu-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/bootstrap-submenu.js")-->

    <!-- Prismjs: Code syntax highlighting library-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/prism.js")-->

    <!-- bootstrap-table: An extended Bootstrap table-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/bootstrap-table.min.js")-->

    <!-- Grid layout-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.gridster.js")-->

    <!-- super simple slider-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/sss.min.js")-->

    <!-- Easy-pie-chart: Lightweight  pie charts-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.easypiechart.min.js")-->

    <!-- Summernote: Lightweight html5 editor-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/summernote.min.js")-->

    <!-- Bootstrap plugin for markdown editing-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/behave.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/markdown.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/to_markdown.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/bootstrap-markdown.js")-->

    <!-- DataTables: It is a highly flexible HTML table.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.dataTables.min.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/dataTables.bootstrap.js")-->

    <!-- Ladda: Buttons with built-in loading indicators.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/spin.min.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/ladda.min.js")-->

    <!-- Counterup: Counts up to a targeted number when the number becomes visible.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/waypoints.min.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery.counterup.min.js")-->

    <!-- Bootstrap-select: Bootstrap's dropdown.js to style and bring additional functionality to normal select boxes.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/bootstrap-select.js")-->

    <!-- Bootstrap-select: Bootstrap's dropdown.js to style and bring additional functionality to normal select boxes.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/bootstrap-datepicker.js")-->

    <!-- jQuery asColorPicker-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery-asColor.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery-asGradient.js")-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery-asColorPicker.js")-->

    <!-- Labelauty jQuery Plugin: checkboxes and radio buttons-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/jquery-labelauty.js")-->

    <!-- Simple upload ui-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/upload.js")-->

    <!-- parsleyjs: the ultimate JavaScript form validation library-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/parsley.min.js")-->

    <!-- Owl Carousel 2: Touch enabled jQuery plugin that lets you create a beautiful responsive carousel slider.-->
    <!-- script(src="<?php echo $url;?>assets/scripts/plugins/owl.carousel.js")-->

    <!-- Theme js-->
    <!-- Concat all plugins js-->
    <script src="<?php echo $url;?>assets/scripts/theme/theme-plugins.js"></script>
    <script src="<?php echo $url;?>assets/scripts/theme/main.js"></script>
    <!-- Below js just for this demo only-->
    <script src="<?php echo $url;?>assets/scripts/demo/demo-skin.js"></script>
    <script src="<?php echo $url;?>assets/scripts/demo/bar-chart-menublock.js"></script>

    <!-- Below js just for this page only-->
    <script src="<?php echo $url;?>assets/scripts/demo/bar-chart.js"></script>
  </body>
</html>
