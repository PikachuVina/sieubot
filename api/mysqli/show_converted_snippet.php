<?PHP
/**
* GUI Template: converted code snippet.
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
<div class="conversion">
    <?PHP 
    $id_summary = '_summary';
    if (($snippet_conv['found'] == $snippet_conv['converted']) && (count($snippet_conv['errors']) == 0)) {
        $title = 'Thành công: ';
        $class = 'conversionok';
    } elseif (($snippet_conv['found'] == $snippet_conv['converted']) && (count($snippet_conv['errors']) > 0)) {
        $title = 'Cảnh báo: ';
        $class = 'conversionwarning';
    } else {
        $title = 'Lỗi: ';
        $class = 'conversionerror';
    }
    ?>
    <div class="conversionheadline <?php echo $class; ?>" onclick='<?php printf('toggle_view("%s")', $id_summary); ?>'>
        +
        <?php echo $title; ?>
        <?php printf('tìm thấy (%s/%s, %s)', $snippet_conv['converted'], $snippet_conv['found'], count($snippet_conv['errors'])); ?>
    </div>
    <div class="conversiondetails" id="<?php echo $id_summary; ?>" <?php if (!$snippet_show_details) {
    print 'style="display:none"';
} ?>>
    <h3>Summary</h3>
    <table cellpadding="0" cellspacing="0" class="conversiondetailstable">
    <tr>
        <th align="right">Tìm thấy</th>
        <th align="right">Đã convert</th>        
        <th align="right">Bị lỗi</th>        
        <th align="right" width="99%">Độ dài</th>
    </tr>
    <tr>
        <td align="right"><?php echo $snippet_conv['found']; ?></td>
        <td align="right"><?php echo $snippet_conv['converted']; ?></td>
        <td align="right"><?php echo count($snippet_conv['errors']); ?></td>
        <td align="right"><?php echo strlen($snippet_conv['output']); ?></td>
    </tr>    
    </table>   
    <?php if (!empty($snippet_conv['errors'])) {
    ?>
    <h3>Thông báo lỗi</h3>
    <table cellpadding="0" cellspacing="0" class="conversiondetailstable">    
    <tr>
        <th>Line</td>
        <th>Message</th>
    </tr>
    <?PHP
    foreach ($snippet_conv['errors'] as $k => $msg) {
        ?>
    <tr class="<?php echo ($k % 2) ? 'tddark' : 'tdbright'; ?>">
        <td><?php echo $msg['line']; ?></td>
        <td><?php echo $msg['msg']; ?></td>
    </tr>
    <?PHP

    } ?>
    </table>
    <?php 
} ?>
    <h3>Convert thành công</h3>
    <p style="color:blue; cursor:pointer" onclick="toggle_view_class('conversionlinenumbers')">Toggle line numbers</p>
    <table cellpadding="0" cellspacing="0" class="conversiondetailstable">    
    <?PHP
    $highlighted_code = highlight_string($snippet_conv['output'], true);
    ?>
    <tr>
        <td style="padding:0.25em">
        <?PHP
        $highlighted_code = highlight_string($snippet_conv['output'], true);
        $code_lines = preg_split('@<br\s*/?>@', $highlighted_code);
        if (count($code_lines) >= 3) {
            echo str_replace('<code>', '<code><span class="conversionlinenumbers">    1. </span>', $code_lines[0]);
            echo '<br />';
            for ($line_num = 1; $line_num < count($code_lines); ++$line_num) {
                printf('<span class="conversionlinenumbers">%5d. </span> %s<br />', $line_num + 1, $code_lines[$line_num]);
            }
        } else { // In case the highlight_string function does not use <br />
            echo $highlighted_code;
        }
        ?>
        </td>
    </tr>
    </table>
    </div>
</div>
