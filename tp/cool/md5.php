<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php require_once  '../../../../../wp-config.php';?>
        <title>下载中心插件</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <META NAME="ROBOTS" CONTENT="NOFOLLOW">

<?php 
//检索设置字段
$post_db = $_GET["p"];



$vodin2 = vp_metabox('_post_format_options.0.format_video_embed1');
echo $vodin2[name1] ;
query_posts('showposts=1&p='.$post_db.'');
if (have_posts()) : while (have_posts()) : the_post(); ?> 

<?php
//获取文章自定义字段文件名字段
$vodin2 = vp_metabox('_post_format_options.format_video_embed1');
$name1 = $vodin2[0][name1];
//下载描述
$namedb  = $vodin2[0][namedb];

//循环下载地址及网盘名称
$vodin = vp_metabox('_post_format_options.format_video_embed');
/*
$i=0;
while($i<=count($vodin)-1)
  {

$vodin1 = $vodin[$i];

$vodin1[name];

$vodin1[url];

$i++;

 };*/
 //获取设置字段值
 
function down_option($names)
{
    return vp_option('down_option.'.$names);
}

;?>


        
        <link rel="shortcut icon" href="favicon.png" />
        <link rel="stylesheet" type="text/css" href="css/clear.css" />
        <link rel="stylesheet" type="text/css" href="css/site.css" />
        <link href="css/facebox.css" rel="stylesheet" type="text/css" />
        <link href="css/fonts/stylesheet.css" media="screen" rel="stylesheet" type="text/css" />
        <link href='http://fonts.useso.com/css?family=Istok+Web:400,700' rel='stylesheet' type='text/css' />
        <link href='http://fonts.useso.com/css?family=Arvo:400,400italic,700,700italic' rel='stylesheet' type='text/css' />
        
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.myHint.js"></script>
        <script type="text/javascript" src="js/jquery.facebox.js"></script>
        <script type="text/javascript" src="js/customUI.js"></script>           
        <script type="text/javascript" src="js/ajax.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <!--[if lt IE 10]>
            <script type="text/javascript" src="js/PIE.js"></script>
        <![endif]-->
    </head>
    <body>
 
<!--文章代码-->   

<?php 
$urlrc1 = home_url();
$url = $_SERVER['HTTP_REFERER']; 
$parts = parse_url($url); 
$cur = $parts[host];

$myurl= $_SERVER['HTTP_HOST'];
if($cur!=$myurl){
    header("location: ".$urlrc1);
exit;}

?>

        <table class="doc-loader">
            <tr>
                <td>
                    <img src="images/loading.gif" alt="loading..." />
                </td>
            </tr>
        </table> 
        <div class="body_wrapper">
            <div class="sprite"></div>
            <div id="header">
            <!--下面是页面logo图片部分-->
            <?php 
            $logo = down_option('up_logo');
            echo '<img src="'.$logo.'" alt="image_logo"/>'
            ?>
            
            </div>
            <div class="wrapper">
                <div class="column-520 m-top-55">
                    <div class="summary" style="font-family:Microsoft YaHei,Arial,Tahoma;">
                        文件名:<?php echo $name1;?>            
                    </div>
                    <div class="summary-small m-top-25 m-bottom-45" style="font-family:Microsoft YaHei,Arial,Tahoma;">
                        下载文件介绍:<?php echo $namedb;?>            
                    </div>
                </div><!--下面是页面图片部分-->
                <img src="<?php echo down_option(up_1s);?>" class="main-image" alt="image_main" />
                <div class="clear-left"></div>
                <div class="buttons-contact">
                    <a href="#contact" class="button-get-in-touch rounded" rel="facebox">点击下载</a>
                    <div class="image-or"></div>
                    <a href="#subscribe" class="button-subscribe rounded" rel="facebox">返回文章</a>                
                </div>
                <div class="clear"></div>
                <div class="wrapper-mid-content m-top-110">
                    
                    <div class="clear"></div>
                    <div class="subheader">
                        <div class="subheader-line m-right-30"></div>
<?php
///下载统计
    
    $db_name_def = 0;
    $db_name = get_post_meta($post_db, 'iiexe_db', true);
    // 检查这个字段是否有值
    if (empty ( $db_name )) { 
    //如果值为空，输出默认值
    $db_name = $db_name_def;

    }
    $iiexe_mdb = $db_name + 1;
    setcookie("scrapi", "scrapi", time()+3600);
    $scrapi = $_COOKIE["scrapi"];
    if (empty($scrapi)) {
        update_post_meta($post_db, 'iiexe_db', $iiexe_mdb);
    }
    

    ;?>
    

                        <h3>下载数：<?php echo $iiexe_mdb;?></h3>
                        <div class="subheader-line m-left-30"></div>
                        <?php echo down_option(ce_1);?><!--页面悬浮的广告-->
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="clear con"><?php echo down_option(we_s1);?><!--版权声明部分--></div>
        
        <!shared---//弹出部分-->

        
        <div id="subscribe">
            <div class="subscribe">
                <div id="fox" class="form-text m-left-100 m-top-60">返回文章</div>
                <img class="notification-hint" src="images/fill_the_forms.png" alt="Subscribe to be notified"/>
                <a class="closePopup" href="javascript: ClosePopupWindow();"><img src="images/close.png" alt="Close" /></a> 
                
                <a class="subscribeButton rounded" id="subscribeButton" href="<?php echo $url;?>" target="_blank">点击返回:<?php echo get_post( $post_db )->post_title;?></a>
                
                <div class="clear"></div>
                <div class="footnote">返回到文章</div>        
            </div>
        </div>
        <div id="contact">
            <div class="contact">
                <div id="fox" class="form-text m-left-50" style="font-size: 40px;">文件名称</div>
                <img class="fill-the-forms" src="images/fill_the_forms.png" alt="Fill the forms bellow"/>
                <a class="closePopup" href="javascript: ClosePopupWindow();"><img src="images/close.png" alt="Close"/></a>
                <ul class="user-data">
                    <li>
                        <?php 

                        $ad = down_option(ce_2);
                        if (!empty($ad)) {
                            echo $ad;
                        } else {
                            echo "广告部分可以添加html代码";
                        }
                        
                        ?><!--弹出页面的广告-->
                    </li>
                     <li>
                        下载简介:<?php echo $namedb;?>
                    </li>
                    
                 下载：
                 <?php
                  $i=0;
                   while($i<=count($vodin)-1){
                   $vodin1 = $vodin[$i];
                   $datm = $vodin1[image];
                  if (!empty($datm))
                     $dat = $datm;
                     else
                  $dat = $vodin1[url];
                  
echo '<a class="submit" id="submitButton" href="'.$dat.'" target="_blank">'.$vodin1[name].'</a>';
$i++;

 };
?>                    
                
                </ul>
            </div>
        </div>
        <?php endwhile; endif; wp_reset_query();?> 
    </body>
</html>