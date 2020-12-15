<div class="footer-mobile <?php if (isset($gen)){echo "gen";} ?>">
    <?php
        if(empty($gen)){
            echo '<select>
                      <option value="cre">Les dernières créations</option>
                      <option value="fav">Les favoris des modérateurs</option>
                      <option value="mag">Ma galerie</option>
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