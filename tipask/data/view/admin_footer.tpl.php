<? if(!defined('IN_TIPASK')) exit('Access Denied'); ?>
<DIV style="CLEAR: both; MARGIN: 5px auto; TEXT-ALIGN: center">Powered by <a href="http://www.tipask.com/" target="_blank">Tipask</a> <?=TIPASK_VERSION?>&nbsp;&copy; 2009-2014  Tipask.</DIV>
</TR>
</TBODY>
</TABLE>
<script type="text/javascript">
    $(document).ready(function() {
        $("#timestart").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
        $("#timeend").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
</script>
</BODY>
</HTML>