<?PHP
/**
* GUI Template: page header.
*
* @category   GUI
*
* @author     Andrey Hristov <andrey@php.net>, Ulf Wendel <ulf.wendel@phpdoc.de>
* @copyright  1997-2006 The PHP Group
* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
*
* @version    CVS: $Id:$, Release: @package_version@
*
* @link       http://www.mysql.com
* @since      Available since Release 1.0
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="UTF-8">
    <title><?php echo (isset($snippet_title)) ? $snippet_title : 'MySQL Convert'; ?></title>
    <link rel="stylesheet" type="text/css" href="css/main.css" /> 
    <script language="JavaScript">
        function toggle_view(id) {
            var el;            
            if (!(el = document.getElementById(id)))
                return;
            
            if (el.style.display == 'none') {                               
                el.style.display = '';
            } else {
                el.style.display = 'none';
            }
            
        }
        function toggle_view_class(className) {
            var elems = document.getElementsByClassName(className);
            for (var i in elems) {
                var el = elems[i];
                if (el.style.display == 'none') {
                    el.style.display = '';
                } else {
                    el.style.display = 'none';
                }
            }
        }
    </script>       
</head>
<body>
<div class="topnav">
<table cellpadding="0" cellspacing="0">
<tr>
    <td width="100%">
        <a class="topnavlink" name="top" href="/api/mysqli">Home</a>
        <?PHP
        /*if (isset($snippet_nav_path) && is_array($snippet_nav_path)) {
            foreach ($snippet_nav_path as $link => $label) {
                printf('&nbsp;--&gt;&nbsp;<a class="topnavlink" href="%s">%s</a>', $link, $label);
            }
        }*/
        ?>        
    </td>
    <td><a class="topnavlink" href="http://facebook.com/BMN.2312">Help</a></td>
</tr>
</table>    
</div>
<div class="topgreetings">
    <h1><?PHP echo (isset($snippet_greeting)) ? $snippet_greeting : 'MySQL to MySQLI'; ?></h1>
</div>
<div class="main">
