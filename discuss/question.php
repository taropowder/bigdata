<?php
/**
 * Created by PhpStorm.
 * User: YOGA710
 * Date: 2018/7/10
 * Time: 19:06
 */
error_reporting(E_ERROR | E_PARSE);
session_start();
include_once "login_require.php";
?>

 <!--问题管理模块-->
        <div role="tabpanel" class="tab-pane active"  id="user">
            <div class="check-div form-inline">
                <p align="center"><font size="+2"> 大数据与网络安全实验室论坛</font></p>
            </div>
            <div class="data-div">
                <div class="row tableHeader">
                </div>
                <div class="tablebody">

                    <?php
                    include 'connect.php';
                    $pagesize = 20;
                    @$p = $_GET['p']?$_GET['p']:1;
                    $offset = ($p-1)*$pagesize;


                    $query=mysqli_query($link,"select * from question order by id desc limit $offset,$pagesize");
                    if($query && mysqli_num_rows($query))
                    {
                        while ($row=mysqli_fetch_array($query)) {

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
                        //分页代码
                        //计算问题总数
                        $count_result = mysqli_query($link,"select count(*) as count from question");
                        $count_array = mysqli_fetch_array($count_result);

                        //计算总的页数
                        $pagenum = ceil($count_array['count']/$pagesize);
                        echo '共',$count_array['count'],'个问题';
                        if($pagenum>1){
                            for($i = 1;$i<=$pagenum;$i++){
                                if($i == $p){
                                    echo '['.$i.']';

                                }else{
                                    echo  ' <a href="forum.php?p='.$i.'">'.$i.'</a>';
                                }
                            }
                        }

                    }
                    else{
                        echo "没有提出的问题！";
                    }

                    mysqli_close($link);
                    ?>
                </div>

            </div>

        </div>

