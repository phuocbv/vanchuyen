<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/custom-theme/jquery-ui-1.8.11.custom.css" />
<link rel="stylesheet" media="screen" href="css/colorbox.css" />
<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="../../bower_components/animate.css/animate.css" type="text/css" />
<link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="../../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
<script src="js/jquery.tools-1.2.5.min.js"></script>
<script src="js/jquery-ui-1.8.11.custom.min.js" language="javascript" type="text/javascript"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/ccvalidations.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title?></title>
<script>
    $(document).ready(function(){
        $(".ccinfo").show();
        $("a[rel='hint']").colorbox();
        $(":radio[name=cctype]").click(function(){
            if($(this).hasClass("isPayPal")){
                 $(".ccinfo").slideUp("fast");
            } else {
                 $(".ccinfo").slideDown("fast");
            }
            resetCCHightlight();
        });

        $("input[name=ccn]").bind('paste', function(e) {
                var el = $(this);
                setTimeout(function() {
                    var text = $(el).val();
                    resetCCHightlight();
                    checkNumHighlight(text);
                }, 100);
        });
    });
</script>
<noscript>
<style>
	.noscriptCase { display:none; }
	#accordion .pane { display:block;}
</style>
</noscript>
</head>
<body>