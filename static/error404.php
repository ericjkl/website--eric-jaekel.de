<!DOCTYPE html>

<html lang="de-de" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>404 - Not Found</title>
    <?php include 'IncludedContent/head.php';?>
</head>
<body>    

    <?php
    include 'IncludedContent/menu.php';
    ?>

    <div class="ContentBox-FormalText">        
    
        <h1>Oops! Error 404</h1>
        <p>The requested site was displaced, deleted or does not exist.</p>
        <p>Possibly, the link or the URL you used was incorrect.</p>
        <h2>What now?</h2>
        <a href="index.php">
            <div class="button-primary button-content">
                To the Homepage
                <div class="button-image-wrapper">
                    <i class="material-icons">chevron_right</i>
                </div>                
            </div>
        </a>
        <br/>
        <a href="javascript:history.back()">
            <div class="button-primary button-content">
                Back to previous page
                <div class="button-image-wrapper">
                    <i class="material-icons">chevron_right</i>
                </div>                
            </div>
        </a>
    </div>

    <?php
    include 'IncludedContent/footer.php';
    ?>
    
</body>
</html>