<?php
header ("Content-Type:text/css");
$color = "#2ECC71";


function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#2ECC71";
}


?>

#mainHeader.header.stiky {
position: fixed;
top: 0;
left: 0;
width: 100%;
z-index: 9999;
background: <?php echo $color ?>;
border-bottom: 0px;
box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
}

.margin-bottom-10{
margin-bottom: 10px;
}

.calculate .box {
background: linear-gradient(to right, <?php echo $color ?>, #6386e4);

}

#footer .newslatterBox .box {
background: <?php echo $color ?>;
}

.calculate .box::after {
background: linear-gradient(to right, rgba(0,123,255,.25), rgba(82, 113, 196, 0.30));

}
.calculate .box input {
height: 45px;
}
.page-title-area {
padding: 114px 0 110px;

position: relative;
z-index: 2;
text-align: center;
}

.page-title-area:after {
position: absolute;
content: '';
left: 0;
width: 100%;
top: 0;
height: 100%;
background: #000;
opacity: .75;
z-index: -1;
}

#welcomeArea .topcontent-bank h1 {
color: #fff;
}
#welcomeArea .topcontent-bank {
padding: 240px 0px 140px;
}

.sectionSeparator {

background: <?php echo $color ?>;

}

.padding-bottom-70{
padding-bottom: 70px;
}

#services {

background: aliceblue;
}
#feature .heading-title p {
margin-top: 3px;
margin-bottom: 68px;
}

#feature .box .topHeader i {

background: linear-gradient(to right, <?php echo $color ?>, #5271c4);
-webkit-background-clip: text;

}
#feature .box:hover {
background: -webkit-linear-gradient(to right, #efb1fd, #5271c4);
background: -moz-linear-gradient(to right, #efb1fd, #5271c4);
background: linear-gradient(to right, <?php echo $color ?>, #5271c4);
}

#feature .box .body a::after {

background: -webkit-linear-gradient(to right, #efb1fd, #5271c4);
background: -moz-linear-gradient(to right, #efb1fd, #5271c4);
background: linear-gradient(to right, <?php echo $color ?>, #5271c4);
}
#feature .box .body a {

background: <?php echo $color ?>;
-webkit-background-clip: text;
}



#mainHeader.header .nav-link:hover {
color: #002A54;
}


.most-viewed-post {
padding: 30px 25px;
}
.single-sidebar-block {
margin-bottom: 30px;
box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.1);
}

.single-sidebar-block h3 {
font-size: 22px;
color: #141414;
margin-bottom: 15px;
}

h3 {

line-height: 32px;
}

.single-most-viewed-post img {
margin-bottom: 15px;
width: 100%;
}
.single-most-viewed-post h4 {
font-size: 16px;
line-height: 24px;
color: #141414;
transition: .4s;
}


.about-content-area {
position: relative;
}
.video-btn {
position: absolute;
top: 50%;
left: 25%;
-webkit-transform: translate(-50%, -50%);
-moz-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
-o-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
z-index: 1;
}
.video-btn a {
width: 100px;
height: 100px;
background-color: <?php echo $color ?>;
color: #FFFFFF;
text-align: center;
line-height: 100px;
font-size: 28px;
border-radius: 50%;
display: inline-block;
}

.about-content-area .right-content-area {
padding: 114px 100px 120px 100px;
}
.right-content-area.bg-gray {
background-color: #fff;
}
.right-content-area {
padding: 0 100px;
}
.about-content-area .right-content-area .title {
margin-bottom: 20px;
font-size: 60px;
line-height: 70px;
font-weight: 500;
}

@media only screen and (max-width: 767px){
.about-content-area .left-content-area {
min-height: 500px;
}
}

@media (max-width: 1199.98px){
#mainHeader .viewPlan a {
    width: 88px;
}
}


@media only screen and (max-width: 991px) and (min-width: 768px){
.about-content-area .video-btn {
top: 23%;
left: 50%;
}
.about-content-area .left-content-area {
display: block;
position: initial;
flex-direction: unset;
min-height: 500px;
}
}

@media only screen and (max-width: 430px){
.about-content-area .video-btn {
top: 19%;
left: 50%;
}
}
@media only screen and (max-width: 767px) and (min-width: 431px){
.about-content-area .video-btn {
top: 23%;
left: 50%;
}
}
#aboutUs .heading-title p {

margin-bottom: 68px;
}

.brand-area {
background: #f0f8ff;
padding: 60px 0;
margin-bottom: 150px;
}
.brand-area .brand-carousel .single-brand-logo img {
padding: 0 15px;
border: 1px solid #d3d3d3;
background: #fff; }


===============================
Hero Area
===============================

*/
.hero-area {
position: relative;
}
.single-hero-area {
height: 100vh;
background-size: cover !important;
}

.hero-content {
display: table;
height: 100%;
width: 100%;
text-align: center;
color: #ffffff;
background: #0000005e;
}

.table-cell {
display: table-cell;
vertical-align: middle;
}

.hero-content h2 {
font-size: 16px;
font-weight: 800;
text-transform: uppercase;
letter-spacing: 5px;
padding: 28px 0 28px;
}


.hero-content h3 {
font-size: 22px;
font-weight: 500;
text-transform: uppercase;
letter-spacing: 2px;
}
.hero-content h3 span {
background: #FF2056;
display: inline-block;
padding: 0px 20px;
border-radius: 50px;
font-size: 18px;
cursor: default;
}
.hero-content p {
font-size: 20px;
margin-bottom: 0;
}





.hero-area .owl-dots {
position: absolute;
left: 50%;
transform: translateX(-50%);
bottom: 3%;
}

.hero-area .owl-dots button {
height: 15px;
width: 15px;
margin: 0 3px;
border-radius: 50%;
border: 2px solid <?php echo $color ?> !important;
}

.hero-area .owl-dot.active {
background: <?php echo $color ?>;
}

.hero-area .owl-dot button:hover {
background: #fff;
border: 0px !important;
}







.hero-area-2 {
height: 100vh;
background-size: cover;
}


.video-content {
position: absolute;
top: 0;
z-index: 10;
overflow: hidden;
}


.ytplayer-container{
position: absolute;
top: 0;
z-index: -1;
}

#ytvideo {
overflow: hidden;
height: 100%;

position: relative;
background: transparent;
}

.video-overlay {
background-size: cover;
position: relative;
color: #000;
z-index: 1;
}

.video-overlay:after {
position: absolute;
left: 0;
top: 0;
height: 100%;
width: 100%;
background: #000;
content: "";
z-index: 5;
opacity: .4;
}
.video-caption-overlay {
background-size: cover !important;
position: relative;
color: #000;
z-index: 200;
}

.video-caption-overlay:after {
position: absolute;
left: 0;
top: 0;
height: 100%;
width: 100%;
background: #fff;
content: "";
z-index: -1;
opacity: .6;
}

#video{
position: relative;
background: transparent;
}

.ytplayer-container{
position: absolute;
top: 0;
z-index: -1;
}



.hero-area-3 {
padding-top: 280px;
padding-bottom: 190px;
}

.static-hero-content {
border: 10px solid #ffffff1f;
color: #fff;
padding: 70px 15px;
}


.static-hero-content h3 {
font-size: 22px;
font-weight: 400;
text-transform: uppercase;
letter-spacing: 3px;
margin-bottom: 15px;
}
.static-hero-content h2 {
font-size: 90px;
font-weight: 800;
text-transform: uppercase;
letter-spacing: 8px;
margin-bottom: 20px;
}






@media (max-width: 991px){
.hero-content h2 {
font-size: 40px;
}

.feature-show {
position: relative;
}

}
@media (max-width: 767px){
.hero-content h2 {
font-size: 40px;
}
.static-hero-content h2 {
font-size: 55px;
}
.hero-area-3 {
padding-top: 140px;
padding-bottom: 100px;
}
}
@media (max-width: 575px){
.single-hero-area {
height: 80vh;
}
.hero-content {
padding: 30px;
}
.hero-content h2 {
font-size: 14px;
}
.static-hero-content h2 {
font-size: 45px;
}
}
.btn-fill {
background: <?php echo $color ?>;
color: #fff;
border: 2px solid <?php echo $color ?>;
}
.bttn-mid {
position: relative;
font-size: 16px;
font-weight: 600;
padding: 12px 45px;
display: inline-block;
cursor: pointer;
font-family: var(--heading-font);
text-transform: capitalize;
transition: 0.4s;
}



.custom .header h5 {
font-size: 26px !important;;
}

#recent-post {
padding-bottom: 24px;
}
.single-widget {
-webkit-box-shadow: 0px 0px 27px 0px rgba(0, 0, 0, 0.15);
box-shadow: 0px 0px 27px 0px rgba(0, 0, 0, 0.15);
padding: 34px 40px 37px;
margin-bottom: 30px;
}
#recent-post h3 {
margin-bottom: 23px;
}
.single-widget h3 {
font-size: 24px;
color: #242424;
font-weight: 600;
text-transform: capitalize;
margin-bottom: 11px;
}
.single-widget .single-recent {
display: flow-root;
}
.single-widget .single-recent {
margin-bottom: 20px;
}
.single-widget .single-recent .part-img {
width: 90px;
height: 70px;
overflow: hidden;
float: left;
margin-right: 10px;
}
.single-widget .single-recent .part-text h4 {
font-size: 15px;
color: #242424;
font-weight: 600;
}
.single-widget .single-recent .part-img img {
height: 100%;
}
img {
max-width: 100%;
}

.section-padding {
padding: 120px 0;
}
.mb-60 {
margin-bottom: 60px;
}
.single-contact-block {
position: relative;
padding: 60px 50px 30px 50px;
text-align: center;
box-shadow: 0px 10px 32px 8px rgba(0, 0, 0, 0.05);
margin-bottom: 30px;
}

.single-contact-block span {
height: 60px;
width: 60px;
line-height: 60px;
font-size: 30px;
color: #fff;
border-radius: 6px;
background: <?php echo $color ?>;
position: absolute;
top: -30px;
left: 50%;
transform: translateX(-50%) rotate(45deg);
}

.single-contact-block i {
transform: rotate(-45deg);
}
.contact-form input {
height: 55px;
}
.contact-form input, .contact-form textarea {
width: 100%;
border: 1px solid #CCCCCC;
border-radius: 4px;
text-indent: 15px;
transition: .4s;
margin-bottom: 30px;
}
.dark-overlay:after {
position: absolute;
left: 0;
top: 0;
height: 100%;
width: 100%;
background: #000;
content: "";
z-index: -1;
opacity: .5;
}

.contact-form button {
cursor: pointer;
border-radius: 4px;
margin-bottom: 35px;
}
.btn-fill {

border: 1px solid transparent;
color: #fff;
transition: 0.4s;
}
.bttn {
position: relative;
font-size: 16px;
font-weight: 600;
padding: 12px 40px;
border-radius: 50px;
display: inline-block;
cursor: pointer;
font-family: 'Poppins', sans-serif;
}

.btn-fill:hover {
background: #fff;
color: <?php echo $color ?>;
border: 1px solid <?php echo $color ?>;
}

#footer .newslatterBox button:hover {
background: #fff;
color: <?php echo $color ?>;
}

#mainHeader .viewPlan a:hover {

color: <?php echo $color ?>;
}

.totop>a {
background: -webkit-linear-gradient(to right, #efb1fd, #5271c4);
background: -moz-linear-gradient(to right, #efb1fd, #5271c4);
background: linear-gradient(to right, <?php echo $color ?>, #5271c4);

}

.totop>a:hover {
background: -webkit-linear-gradient(to left, #efb1fd, #5271c4);
background: -moz-linear-gradient(to left, #efb1fd, #5271c4);
background: linear-gradient(to left, <?php echo $color ?>, #5271c4);
}

.site-preloader {
background: -webkit-linear-gradient(to right, #efb1fd, #5271c4);
background: -moz-linear-gradient(to right, #efb1fd, #5271c4);
background: linear-gradient(to right, <?php echo $color ?>, #5271c4);
}

@media (max-width: 991.98px){
#navbarSupportedContent {
background: -webkit-linear-gradient(to right, #efb1fd, #5271c4);
background: -moz-linear-gradient(to right, #efb1fd, #5271c4);
background: linear-gradient(to right, <?php echo $color ?>, #5271c4);
}
}

#footer .box .social_links i {

background: <?php echo $color ?>;
}

#wcu {
padding: 124px 0px 102px;
background-color: aliceblue;
}


.about-padding{
padding-top: 100px;
}

@media only screen and (max-width: 768PX){
.about-padding{
padding-top: 50px;
}
}@media only screen and (max-width: 992PX){
.about-padding{
padding-top: 100px;
}
}

#paymentMethod form button:hover {
border-color: #fff;
background: #fff;
color: <?php echo $color ?>;
}

.padding-top-10{
padding-top: 10px;
}
}



#paymentMethod form button:hover {
border-color: #fff;
background: #fff;
color: <?php echo $color ?>;
}
.viewPlan a {
width: 100%;
height: 50px;
display: inline-block;
border: 2px solid #fff;
text-align: center;
line-height: 50px;
color: #fff;
text-transform: uppercase;

border-radius: 4px;
}

.viewPlan a:hover {
color: <?php echo $color ?>;
}
.viewPlan a:hover {
background: #fff;
border-color: #fff;

}
