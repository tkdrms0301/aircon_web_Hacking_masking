<table width="228" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td><A HREF="../customer/customer.php"><img src="../img/main/qna1.jpg" width="228" height="27"></A></td>
    </tr>
    <tr>
        <td>
            <table width="228" border="0" cellspacing="0" cellpadding="0">
                <?php
                include "../include/session_config.php";
                $query = DBquery("select * from brd_qna order by replyno desc, reply limit 0, 4");
                while ($row = mysql_fetch_array($query)) {
                    ?>
                    <tr>
                        <td width="10" height="21"><img src="../img/main/qna2.jpg" width="4" height="2"></td>
                        <td width="218"><a href="../customer/customer.php?show=view&id=<?= $row['id'] ?>&board=qna"><?= cut_string($row['subject'], 32) ?></a></td>
                    </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
</table>