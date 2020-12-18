<div class="footer-mobile <?php if (isset($style)){echo "gen";} ?>">
    <?php
        if($style=="index"){
            echo '<select>
                      <option value="cre">Last posts</option>
                      <option value="fav">The bests</option>
                      <option value="mag">My gallery</option>
                  </select>';
        }
    ?>
    <div>
        <div></div>
        <div></div>
        <a href="mentions.php" title="Legal disclaimer"><div class="mentions"></div></a>
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