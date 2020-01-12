<?php
include "header.php";
?>
<body>
    <div class="myalign">
        <div>
            <?php
            if (!empty($error)) {
                echo $error;
            }
            ?>
        </div>
        <div class="myfiles">
            <?php
            //piesiamas failu sarasas
            if ($filesList != false) {
                ?>
                <div>
                    <form method="post">
                        <button class="myButton myButton2" id="file" type="submit" name="showContent" value="<?php echo $myFile;?>">Rodyti turinį</button>
                    </form>
                </div>
                <div>
                    <input class="myInput" type="text" id="myInput1" onkeyup="filterFiles()" placeholder="Failų paieška">
                </div>
                <div class="scrollFile">
                    <?php
                        ?>
                        <ul id="myUL" class="myUl">
                            <?php
                            foreach($filesList as $file){
                                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['showContent'])) {
                                    if ($_POST['showContent'] == $file) {
                                        $className = "myLiSelected";
                                    } else {
                                        $className = "myLi";
                                    }
                                } else {
                                    $className = "myLi";
                                }
                                ?>
                                <li id="<?php echo $file;?>" class="<?php echo $className;?> allFiles" onclick="selectFile('<?php echo $file;?>')"><a><?php echo $file;?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        //piesiamas failo turinys
        if ($load != false) {
            ?>
            <div class="mycontent scrollContent tableFixHead">
                <table class="myTable" id="myTable">
                    <thead>
                        <tr>
                            <th class="myCell myFileCell" colspan="3">
                                <input class="myInput" type="text" id="myInput2" onkeyup="filterContent()" placeholder="Įrašų paieška">
                            </th>
                        </tr>
                        <tr>
                            <th class="myCell myFileCell" colspan="3"><?php echo $myFile;?></th>
                        </tr>
                        <tr>
                            <th class="myCell myCname font">Vardas</th>
                            <th class="myCell myCage">Amžius</th>
                            <th class="myCell myCgender">Lytis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        foreach ($load as $data) {
                            if ($x % 2 == 0) {
                                $rowStyle = "myContent1";
                            } else {
                                $rowStyle = "myContent2";
                            }
                            ?>
                            <tr>
                                <td class="myCell <?php echo $rowStyle;?>"><?php echo $data['first_name'];?></td>
                                <td class="myCell <?php echo $rowStyle;?>"><?php echo $data['age'];?></td>
                                <td class="myCell <?php echo $rowStyle;?>"><?php echo $data['gender'];?></td>
                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
    </div>
</body>
<?php
include "footer.php";
?>