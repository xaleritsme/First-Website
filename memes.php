<?php
    include "main/header.php";
?>
    <div id="consid">
        <div id="content">
            <h4 class="subheader">Memes</h4>
            <form method="post">
                <input type="submit" class="memebutton" value="Gimme next!" />
            </form>
            <?php
                $root = '';
                $path = 'memes/';
                $imgList = getImagesFromDir($root . $path);
                $img = getRandomFromArray($imgList);
                function getImagesFromDir($path) 
                {
                    $images = array();
                    if ( $img_dir = @opendir($path) ) 
                    {
                        while ( false !== ($img_file = readdir($img_dir)) ) 
                        {
                            if ( preg_match("/(|\.jpg|\.png)$/", $img_file) ) 
                            {
                                $images[] = $img_file;
                            }
                        }
                        closedir($img_dir);
                    }
                    return $images;
                }
                function getRandomFromArray($ar) 
                {
                    $num = array_rand($ar);
                    return $ar[$num];
                }    
            ?>    
            <img src="<?php echo $path . $img ?>" class="memes"/>
            <div id="ranking">
                <?php
                    $connection = mysqli_connect("localhost","s403376","piprekaleksander") or die ("Error 001");
                    $db = mysqli_select_db($connection, "s403376") or die ("Error 002");
                    $sql = "SELECT Name FROM ranking" or die ("Error 003");
                    $sql_result = mysqli_query($connection,$sql) or die("Error 004");
                    echo "<TABLE BORDER=1>";
                    echo "<TR><TH>Imie</TH><TH>Clicks</TH>";                
                    while ($row = mysqli_fetch_array($sql_result))
                    {
                        $Name = $row["Name"];
                        echo "<TR><TD>$Name</TD><TD></TD>";
                    }
                    echo "</TABLE>";
                    mysqli_free_result($sql_result);
                    mysqli_close($connection);                
                ?>    
            </div>
        </div>
        <?php
            include "main/sidebar.php";
        ?>
    </div>
<?php 
    include "main/footer.php";
?>