<!-- Footer -->
<?php
  include "config.php";

if(!isset($_SESSION['user_id'])){

    header("Location:{$hostname}/admin/index.php");
}

?>
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2019 News | Powered by <a href="http://yahoobaba.net/">Yahoo Baba</a></span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
