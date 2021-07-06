<?php
/**
 * @author Eugine Terentev <eugine@terentev.net>
 * @author Victor Gonzalez <victor@vgr.cl>
 * @var yii\web\View $this
 * @var string $content
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<?php
$this->registerCssFile("@web/css/admin.css");
 ?>
<?php $this->beginContent('@backend/views/layouts/common.php'); ?>
    <div class="box">
        <div class="box-body">
            <?php echo $content ?>
        </div>
    </div>
<?php $this->endContent(); ?>
