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
            if ($filesList != false) {
                ?>
                <div>
                    <form method="post">
                        <button id="file" type="submit" name="showContent" value="<?php echo $myFile;?>">Rodyti turinį</button>
                    </form>
                </div>
                <div>
                    <input type="text" id="myInput1" onkeyup="filterFiles()" placeholder="Failų paieška">
                </div>
                <div>
                    <?php
                        ?>
                        <ul id="myUL">
                            <?php
                            foreach($filesList as $file){
                                ?>
                                <li onclick="selectFile('<?php echo $file;?>')"><a><?php echo $file;?></a></li>
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
        if ($load != false) {
            ?>
            <div class="mycontent">
                <table class="myTable" id="myTable">
                    <tr>
                        <th class="myCell" colspan="3"><?php echo $myFile;?></th>
                    </tr>
                    <tr>
                        <input type="text" id="myInput2" onkeyup="filterContent()" placeholder="Įrašų paieška">
                    </tr>
                    <tr>
                        <th class="myCell myCname">Vardas</th>
                        <th class="myCell myCage">Amžius</th>
                        <th class="myCell myCgender">Lytis</th>
                    </tr>
                    <?php
                    foreach ($load as $data) {
                        ?>
                        <tr>
                            <td class="myCell"><?php echo $data['first_name'];?></td>
                            <td class="myCell"><?php echo $data['age'];?></td>
                            <td class="myCell"><?php echo $data['gender'];?></td>
                        </tr>
                        <?php
                    }
                    ?>
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