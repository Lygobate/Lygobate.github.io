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
        <div></div>
    </div>
</div>
</body>
</html>