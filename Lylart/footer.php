<div class="footer-mobile <?php if ($style=="index"){echo "gen";} ?>">
    <div class="choix">
        <div req="lastPosts"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></div>
        <div req="fav"><i class="fas fa-star"></i></div>
        <?php
            if (isset($_SESSION["token"])){
                echo '<div req="mag"><i class="fas fa-images"></i></div>';
            } else{
                echo '<a href="new_user_and_connection_form.php"><div title="Log in"><i class="fas fa-images"></i></div></a>';
            }
        ?>
    </div>
</div>
<div class="mentions">
    <?php
        if($style=="gen"){
            echo '<a href="../mentions.php">Legal disclaimer</a>';
        }else{
            echo '<a href="mentions.php">Legal disclaimer</a>';
        };
    ?>
</div>
</body>
</html>
