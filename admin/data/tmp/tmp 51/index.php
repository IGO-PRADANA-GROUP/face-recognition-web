<?php 
    $url = '../../../data/tmp/tmp 51/Notebook-AdminPanel-master/';
    include '../../../include/all_include.php';
    include '../../../include/function/session.php'; 
	?>


  <link rel="stylesheet" href="<?php echo $url;?>css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $url;?>css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $url;?>css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $url;?>css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $url;?>js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $url;?>css/app.css" type="text/css" />
</head>
<body>
  <section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?php echo $url;?>images/logo.png" class="m-r-sm"><?php echo ucwords($judul);?></a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle dker" data-toggle="dropdown">
            <i class="fa fa-building-o"></i> 
            <span class="font-bold"><?php tabelnomin();?></span>
          </a>
          <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
            <div class="wrapper lter m-t-n-xs">
              <a href="#" class="thumb pull-left m-r">
                <img src="<?php echo $avatar;?>" class="img-circle">
              </a>
              <div class="clear">
                <a href="#"><span class="text-white font-bold"><?php echo ucwords($siapa);?></a></span>
                <small class="block"><?php echo ucwords($judul);?></small>
                <a href="<?php logout();?>" class="btn btn-xs btn-success m-t-xs">Logout</a>
              </div>
            </div>
            
          </section>
        </li>
        <li>
          <div class="m-t m-l">
            <a href="#" class="dropdown-toggle btn btn-xs btn-primary" title="Upgrade"><i class="fa fa-long-arrow-up"></i></a>
          </div>
        </li>
      </ul>      
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="<?php echo $avatar;?>">
            </span>
            <?php echo ucwords($siapa);?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            
            <li>
              <a href="<?php home();?>">Home</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?php logout();?>" data-toggle="ajaxModal" >Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark lter aside-md hidden-print" id="nav">          
          <section class="vbox">
            <header class="header bg-primary lter text-center clearfix">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-dark btn-icon" title="New project"><i class="fa fa-user"></i></button>
                <div class="btn-group hidden-nav-xs">
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                    <?php echo ucwords($siapa);?>
                   
                  </button>
                  <ul class="dropdown-menu text-left">
                    <li><a href="<?php home();?>">Home</a></li>
                    <li><a href="<?php logout();?>">Logout</a></li>
                   
                  </ul>
                </div>
              </div>
            </header>
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                  <ul class="nav">

 <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
                <li class="treeview">
                    <a href="<?php echo $i->l;?>">
                        <i class="<?php echo $i->i;?>"> <b class="bg-warning"></b></i>
                        <span><?php echo $i->n;?></span>

                    </a>
                </li>
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

				<li>
                      <a href="#layout">
                        <i class="<?php echo $i->i;?> icon">
                          <b class="bg-info"></b>
                        </i>
                        <span class="pull-right">
                          <i class="fa fa-angle-down text"></i>
                          <i class="fa fa-angle-up text-active"></i>
                        </span>
                        <span><?php echo $i->n;?></span>
                      </a>
                      <ul class="nav lt">
                        
                    
				
             
                            <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                       <li>
                          <a href="<?php echo $i1->l;?>">                                                        
                            <i class="fa fa-angle-right"> <b class="bg-primary"></b></i>
                            <span><?php echo $i1->n;?></span>
                          </a>
                        </li>
                       
                        <?php }} ?>
                      </ul>
                    </li>

            <!-- /MULTI -->
            <?php }} ?>
 <!-- /MENU -->					

				  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer lt hidden-xs b-t b-dark">
             
             
              <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i> 
                <i class="fa fa-angle-right text-active"></i>
              </a>
             
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href=""><i class="fa fa-home"></i> Page</a></li>
                <li class="active"><?php tabelnomin();?></li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">Management Database</h3>
                <small> <?php echo ucwords($judul); ?></small>
              </div>
             <div class="row">
                <div class="col-sm-12">
                  <section class="panel panel-info">
				  
				  <br>	
				  <br>
                    <?php include 'halaman.php'; ?> 
				  <br>	
				  <br>
                  </section>
				 
                </div>
              </div>
              <div class="row">
             </div>
              <div>
                <div class="btn-group m-b" data-toggle="buttons">
                   <?php echo ucwords($copyright); ?>
                </div>
             
              </div>
            </section>
          </section>
         
        </section>
       
      </section>
    </section>
  </section>
  <script src="<?php echo $url;?>js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo $url;?>js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo $url;?>js/app.js"></script>
  <script src="<?php echo $url;?>js/app.plugin.js"></script>
  <script src="<?php echo $url;?>js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $url;?>js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="<?php echo $url;?>js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo $url;?>js/charts/flot/jquery.flot.min.js"></script>
  <script src="<?php echo $url;?>js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="<?php echo $url;?>js/charts/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo $url;?>js/charts/flot/jquery.flot.grow.js"></script>
  <script src="<?php echo $url;?>js/charts/flot/demo.js"></script>

  <script src="<?php echo $url;?>js/calendar/bootstrap_calendar.js"></script>
  <script src="<?php echo $url;?>js/calendar/demo.js"></script>

  <script src="<?php echo $url;?>js/sortable/jquery.sortable.js"></script>

</body>
</html>