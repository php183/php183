<!DOCTYPE html><!--[if IE 8]><html class="ie8 lt-ie10">
<![endif]--><!--[if IE 9]><html class="ie9 lt-ie10">
<![endif]--><!--[if gt IE 9]>
<!--><html><!--<![endif]--><head>	
<meta charset="utf-8" />	
	<title>登录 - 嗨易购</title> <meta name="description" content="嗨易购是白领女性时尚消费品牌，为超过1亿注册用户提供导购信息。建立300万全球女性时尚品牌商品库，超过1000家全球品牌达成官方合作导购体验，更好的满足白领女性的时尚消费需求。" /> 
<meta name="keywords" content="嗨易购,嗨易购官网,嗨易购首页,嗨易购登录,导购,白领,女装,网购" />	
	<link rel="dns-prefetch" href="//static.meilishuo.net/">	
		<link rel="dns-prefetch" href="//s6.mogucdn.com/">	<link rel="dns-prefetch" href="//s7.mogucdn.com/">	
<link rel="dns-prefetch" href="//s11.mogucdn.com/">	<link rel="dns-prefetch" href="//s16.mogucdn.com/">
	<link rel="dns-prefetch" href="//s17.mogucdn.com/">	<link rel="dns-prefetch" href="https://s10.mogucdn.com/"> 
	<meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1" />	<meta name="renderer" content="webkit">
		<meta name="mobile-agent" content="format=html5;url=http://m.meilishuo.com"> 
		<link rel="icon" href="https://s10.mogucdn.com/mlcdn/c45406/170612_02i668aijej2cb21ji56g98a218dg_48x48.png" type="image/x-icon"/>	<link rel="stylesheet" href="Css/sidebar.css') }}">	
		<link type="text/css" rel="stylesheet" href="<?php echo e(asset('/home/Css/base-2bac77b294.css')); ?>">	
		<link type="text/css" rel="stylesheet" href="<?php echo e(asset('/home/Css/login-d50f226da3.css')); ?>">	
		<script type="text/javascript" src="<?php echo e(asset('/home/Scripts/170425_88i053fl0id9k0a63lfhkdaf9g991.js')); ?>"><!-- fml.js --></script>	
		<script>	fml.setOptions({'sversion':'1705221535.25','defer':true ,'modulebase' : 'http://static.meilishuo.net/pc/jsmin/'});	 var Meilishuo = {"config":{"nt":"1yQyN1tU7ssTVQ5GeZ16w2CxWEE3H/gW5LrQItD4XmdeGloR3EzXeVz+b6FC/KyA","main_site_domain":"http://www.meilishuo.com/","controller":"user-login","isLogin":false,"userInfo":{}},"global":{}};	</script>
		</head>
		<script type="text/javascript" src="<?php echo e(asset('/home/Scripts/index.min.js')); ?>"><!-- 设备指纹 -->
		</script>
		<body>
			<div class="page">	
			<h1>		
				<span><img src="<?php echo e(asset('/home/Images/170608_4abia54942c229cgg69f073b9g23d_408x104.png')); ?>"> <font color="pink">嗨易购</font></span>
			</h1>
				<div class="content">					
				<div class="left-box">	
				<h2><font color="pink">嗨易购 一家专门做特卖的网站</font></h2><br/>

					<img src="<?php echo e(asset('/home/Picture/idid_ifrgmmjqmnsgmmbvmizdambqmeyde_370x353.jpg')); ?>" alt="">
				</div>
				<div class="right-box">	
				<p class="title">	
					登录嗨易购		
					<a href="/home/sign" class="register">新用户注册</a>
				</p>	
				<form action="/home/dologin" method="post">		 <?php echo e(csrf_field()); ?>

				<div  class="form">			
					<p class="error-tips" id="errorTip"></p>		
				<div class="item">	
				 <?php if(session('info')): ?>
          			<p class="text-danger"><?php echo e(session('info')); ?></p>
  			     <?php endif; ?>			
					<input type="text" name="name" class="ui-input phone" placeholder="请输入用户名">	
				</div>			
				<div class="item">				
					<input type="password" name="password" class="ui-input password" placeholder="密码">		
				</div>	<br/>		
				<div class="form-group has-feedback">
			       <input type="text" name="code" width="15px;" class="ui-input yanzhengma" placeholder="验证码" >
			       &nbsp;&nbsp;
			       <a onclick="javascript:re_captcha();" ><img src="<?php echo e(URL('kit/captcha/1')); ?>"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
      			</div>	
				<div class="item">				
				<input type="submit" name="submit" value="立即登录" class="submit">
				</div>			
				<div class="item">				
					<label>					
						<input type="checkbox" value="1" name="read" class="check" id="remenber">					记住我				
					</label>				
						<a target="_blank" href="/account/findPwd" class="forget">忘记密码</a>			
				</div>
			</div>	
		</form>
		   <script>	
			 $(function () {
	   		 $('input').iCheck({
	     	 checkboxClass: 'icheckbox_square-blue',
	    	  radioClass: 'iradio_square-blue',
	     	 increaseArea: '20%' // optional
	  	  });
	 	 });
			// 点击生成新的验证码
				 function re_captcha() {
				 $url = "<?php echo e(URL('kit/captcha')); ?>";
				 $url = $url + "/" + Math.random();
				 document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
			  }
		   </script>
	   </div>
	  </div>			
	 </div>
	</div>
				

	</body>
</html>