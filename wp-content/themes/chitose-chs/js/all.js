jQuery(document).ready(function($){
	$('#s').live('mouseover',function(e){
		var Y = $('#s').position().top;
		var H = $('#s').height();
		if ($("#wpadminbar").length > 0){
			var topH = $("#wpadminbar").height();
			$("#searchsubmit").css({'top':Y + 15 + topH + 'px','display':'block'});
		}else{
			$("#searchsubmit").css({'top':Y + 15 + 'px','display':'block'});
		};
		$(this).focus();
		$(this).select();
	}).live('mouseout',function(e){
		$("#searchsubmit").css({'display':'none'});$(this).blur();
		$("#s").val("搜　索");
	});
	$('.title a').live('mouseover',function(e){
		$(this).parent().siblings('.tag-wrapp').slideDown("fast");
		$(this).parent().siblings('.tags').css({'opacity':'0.8'});
	}).live('mouseout',function(e){
		$(this).parent().siblings('.tag-wrapp').slideUp("fast");
		$(this).parent().siblings('.tags').css({'opacity':'1'});
	});
	$('#respond textarea').live('mouseover',function(e){
		$(".logged-in-as").slideDown("fast");
	});
	if ($("#wpadminbar").length > 0){
		var topH = $("#wpadminbar").height();
		$('.close').css({'top':topH + 'px'});
	};
	$("#wpadminbar").css({'position':'fixed'});
	$(window).resize(function(){
		if ($("#wpadminbar").length > 0){
			var topH = $("#wpadminbar").height();
			$('.close').css({'top':topH + 'px'});
		}
		var borwserWidth = $(window).width();
		var borwserHeight = $(window).height();
		var loginWindowTop = $(window).height() / 2 - 110;
		var loginWindowLeft = $(window).width() / 2 - 161;
		$(".login").css({'top': loginWindowTop + 'px','left':loginWindowLeft + 'px'});
		$("#wpadminbar").css({'position':'fixed'});
	});
});
function closeBannerAnimation()
{
	$("#banner").slideUp("fast");
	$("#content").css ({'border-top':'1px solid #F3F3F3'});
};
function openToolbar()
{
	$(".main").css({'display':'none'});
	$(".toolbar").css({'display':'block'});
};
function closeToolbar()
{
	$(".toolbar").css({'display':'none'});
	$(".main").css({'display':'block'});
};
function closeLoginWindow()
{
	$("#black-wrapp").css({'display':'none'});
};
function closeLoginCheck()
{
	var author = $("input#author").val();
	var email = $("input#email").val();
	var email_str = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
	if (author != "" && email != ""){
		if (!email_str.test(email)){alert ("电邮格式错误");}else{
			$("#black-wrapp").css({'display':'none'});
			$(".notice").css({'display':'none'});
			$("textarea#comment").removeAttr('disabled');
		};
	}else if (author == ""){alert ("昵称不能为空");}
	else if (email == ""){alert ("电邮不能为空");};
};
function showLoginWindow() {
	var borwserWidth = $(window).width();
	var borwserHeight = $(window).height();
	var loginWindowTop = $(window).height() / 2 - 110;
	var loginWindowLeft = $(window).width() / 2 - 161;
	$("#black-wrapp").css({'display':'block'});
	$(".login").css({'top': loginWindowTop + 'px','left':loginWindowLeft + 'px'});
};
function textAreaDisable() {
	$("textarea#comment").attr('disabled', 'disabled');
};
function addPic() {
	var textArea = $('textarea#comment').val();
	var picUrl = window.prompt("请输入图片链接");
	if (picUrl == ''){
		alert ('请输入图片链接');
	}
	else if (!picUrl == ''){
	$('textarea#comment').val(textArea + '<img href="' + picUrl + '"></img>');
	};
};
function addWebUrl() {
	var textArea = $('textarea#comment').val();
	var webUrl = window.prompt("请输入链接");
	if (webUrl == ''){
		alert ('请输入链接');
	}
	else if (!webUrl == ''){
	$('textarea#comment').val(textArea + '<a href="' + webUrl + '"></a>');
	};
};