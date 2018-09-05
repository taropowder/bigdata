<?php
/**
 * Created by PhpStorm.
 * User: YOGA710
 * Date: 2018/7/19
 * Time: 18:10
 */
error_reporting(E_ERROR | E_PARSE);
?>
<div role="tabpanel" class="tab-pane" id="scho">

    <div class="check-div form-inline">
    </div>
    <div class="data-div">
        <div class="row tableHeader">

        </div>
        <div class="tablebody">

            <?php
            include ('connect.php');
            session_start();
            include_once "login_require.php";
            $user=$_SESSION['user'];
            $query=mysqli_query($link,"select * from question where user ='$user'");
            if($query && mysqli_num_rows($query)) {
                while ($row = mysqli_fetch_array($query)) {
                    ?>

                    <div class="row">
                        <table>
                            <tr>
                                <td width="40"><img src="images/icon_source_grey.png"></td>
                                <td width="600"><p><a
                                                href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row['title'] ?></a>
                                    </p></td>
                                <td width="200">
                                    <center><?php echo $row['user'] ?></center>
                                </td>
                                <td width="150">
                                    <center><?php echo $row['time'] ?></center>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php
                }
            }
            else{
                echo "你还未提出过问题！";
            }
            mysqli_close($link);
            ?>

        </div>

    </div>

</div>