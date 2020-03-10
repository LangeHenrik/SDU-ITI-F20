<form>
    <input type="text" name="whatever" />
    <input type="submit" />
</form>

<?php
if(isset($_GET['whatever'])) :
    echo htmlspecialchars(htmlspecialchars($_GET['whatever']));
    echo '<br/><br/>';
    echo htmlentities(htmlentities($_GET['whatever']));
endif;