<?php 
function slideshow()
{
	include_once "home/include/settings/settings.php";
	?>

<section id="featured">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<!-- Slider -->
						<div id="main-slider" class="flexslider">
							<ul class="slides">
								<li>
									<img src="<?php echo $slide_a1;?>" alt="" />
									<div class="flex-caption">
										<h3><?php echo $judul_slide;?></h3>
										<a href="<?php echo $link_slide;?>" class="btn btn-theme"><?php echo $tombol_slide;?></a>
									</div>
								</li>
								<li>
									<img src="<?php echo $slide_a2;?>" alt="" />
									<div class="flex-caption">
										<h3><?php echo $judul_slide;?></h3>
										<a href="<?php echo $link_slide;?>" class="btn btn-theme"><?php echo $tombol_slide;?></a>
									</div>
								</li>
								<li>
									<img src="<?php echo $slide_a3;?>" alt="" />
									<div class="flex-caption">
										<h3><?php echo $judul_slide;?></h3>
										<a href="<?php echo $link_slide;?>" class="btn btn-theme"><?php echo $tombol_slide;?></a>
									</div>
								</li>
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>



		</section>

<?php } ?>