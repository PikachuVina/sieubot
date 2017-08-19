<?PHP
/**
* GUI: convert a code snippet.
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
if (isset($_POST['cancel'])) {
    // Cancel button
    header('Location: index.php');
    exit(0);
}

require_once 'MySQLConverterTool_GUI_Snippets.php';

//$snippet_title = 'MySQL Converter';
//$snippet_greeting = 'Convert a code snippet';
$snippet_nav_path = array($_SERVER['PHP_SELF'] => 'Convert a code snippet');
MySQLConverterTool_GUI_Snippets::load(dirname(__FILE__).'/header.php');

if (empty($_POST) || !isset($_POST['start'])) {
    // show the form
    MySQLConverterTool_GUI_Snippets::load(dirname(__FILE__).'/form_snippet.php');
} else {
    // process the form
    $snippet_errors = array();
    if ('' == trim($_POST['snippet'])) {
        $snippet_errors['snippet'] = 'Bạn cần dán code cần chuyển đổi vào khung.';
    }

    if (!empty($snippet_errors)) {
        // show the form
        MySQLConverterTool_GUI_Snippets::load(dirname(__FILE__).'/form_snippet.php');
    } else {
        // let's try to convert some files... 

        require_once 'Converter.php';
        $conv = new MySQLConverterTool_Converter();

        $snippet_conv = $conv->convertString($_POST['snippet']);
        $snippet_show_details = true;

        MySQLConverterTool_GUI_Snippets::load(dirname(__FILE__).'/show_converted_snippet.php');
    }
}
MySQLConverterTool_GUI_Snippets::load(dirname(__FILE__).'/footer.php');
