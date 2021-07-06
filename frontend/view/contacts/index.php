<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Html;
//use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
//use yii\helpers\Html;
use yii\web\View;
use frontend\models\Contacts;
use yii\widgets\Pjax;
use yii\bootstrap4\Modal;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap4\LinkPager;

$this->title = Yii::$app->name;
?>

<div class="content-wrapper" style="min-height: 902.8px;">
    <div class="dashboard_right_detail">
        <div class="contact-page-listing">
            <div class="contatct">
                <div class="tab-btn-section">
                    <ul>
                        <li>
                            <button class="btn btn-blueee">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 448 448" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                    <g>
                                    <path xmlns="http://www.w3.org/2000/svg" d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0" fill="#000000" data-original="#000000" style=""></path>
                                    </g>
                                </svg>
                                Add a Listing
                            </button>
                        </li>
                        <li>
                            <button class="btn btn-blueee light-blue" id="modal-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                    <g transform="matrix(-1,-1.2246467991473532e-16,1.2246467991473532e-16,-1,512,512)">
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M507.296,4.704c-3.36-3.36-8.032-5.056-12.768-4.64L370.08,11.392c-6.176,0.576-11.488,4.672-13.6,10.496    s-0.672,12.384,3.712,16.768l33.952,33.952L224.448,242.272c-6.24,6.24-6.24,16.384,0,22.624l22.624,22.624    c6.272,6.272,16.384,6.272,22.656,0.032l169.696-169.696l33.952,33.952c4.384,4.384,10.912,5.824,16.768,3.744    c2.24-0.832,4.224-2.112,5.856-3.744c2.592-2.592,4.288-6.048,4.608-9.888l11.328-124.448    C512.352,12.736,510.656,8.064,507.296,4.704z" fill="#000000" data-original="#000000" style="" class=""></path>
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M448,192v256H64V64h256V0H32C14.304,0,0,14.304,0,32v448c0,17.664,14.304,32,32,32h448c17.664,0,32-14.336,32-32V192H448z    " fill="#000000" data-original="#000000" style="" class=""></path>
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    <g xmlns="http://www.w3.org/2000/svg"></g>
                                    </g>
                                </svg>
                                Import Contact
                            </button>
                        </li>
                        <li>
                        <?php $form = ActiveForm::begin(['id' => 'contact-search-form','method' => 'get','action' => ['contacts/index']]); ?>
                            <div class="listing-search">
                                <input autocomplete="off" type="search" id="query" name="q" placeholder="Search..." value="<?=!empty($getData)?$getData['q']:''?>">
                                <?=Html::img("@web/img/resources/Group 4551.png")?>
                            </div>
                        <?php ActiveForm::end(); ?>
                        </li>
                        <li>
                            <div class="dropdown dropdown-landing">
                                <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Newest  <i class="fa fa-sort-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#">Edit Contact</a></li>
                                    <li><a href="#"  style="color: red!important">Delete</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="contatct-table">
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="">
                                <th><input type="checkbox" name="" id="checkbox23"> </th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <?php /*<th>Status</th>*/ ?>
                                <th>RENBY app </th>
                                <?php /*<th>Received Documents </th>*/ ?>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody><?php
                        foreach($contactData as $contacts){ ?>
                            <tr>
                                <td><input type="checkbox" name="" id="checkbox_<?=$contacts['id']?>"></td>
                                <td><h2><?=$contacts['name']?></h2></td>
                                <td class="email-text"><?=$contacts['email']?></td>
                                <td class="number-text"><?=!empty($contacts['phone'])?$contacts['phone']:''?></td>
                                <?php /*<td>
                                    <div class="inactivate">
                                    <a href="" >INACTIVE</a>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                            60%
                                        </div>
                                    </div>
                                    </div>
                                </td>*/ ?>
                                <td class="btn-btnlink">
                                    <a href="" class="send-btnn">
                                        <label>
                                        <input onchange="sendEmailContact('<?=$contacts['id']?>','<?=$contacts['mongo_status']?>')" type="checkbox" id="checkbox22" <?=($contacts['mail_send_status'] == 1)?'checked':''?>>
                                        Send</label>
                                    </a>
                                </td>
                                <?php /*<td>
                                    N/A
                                </td>*/ ?>
                                <td>
                                    <div class="dropdown img-dropdwon ">
                                    <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=Html::img("@web/img/resources/Group 4546.png")?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                    </ul>
                                    </div>
                                </td>
                            </tr><?php
                        } ?>
                        </tbody>
                    </table>
                    <div class="pangination-style">
                        <div class="Showing-data "><?php
                            $totalCount = $pages->totalCount;
                            $showThisPage = count($contactData);
                            ?>
                            <p>Showing <?=$showThisPage?> from <?=$totalCount?> data </p>
                        </div><?php 
                        echo LinkPager::widget([
                            'pagination' => $pages,
                            'prevPageLabel' => '<span aria-hidden="true">«</span>&nbsp;&nbsp;Previous',
                            'nextPageLabel' => 'Next&nbsp;&nbsp;<span aria-hidden="true">»</span>',
                            'maxButtonCount' => 4,
                            'options' => ['class' => 'nav-pagitnation'],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   <footer class="main-footer">
    Copyright &copy; 2017 OnLead . all rights reserved
    </footer> -->
</div>
<div class="loading_img_div">
    <?= Html::img('@web/img/loading-image.gif', ['id' => 'loading-image']) ?>
</div>
<style>
    .loading_img_div{
    text-align: center;
    display: none;
   }
   .send_success{
       display : none;
   } 
   .send_failed{
       display : none;
   } 

</style>
<?php 
    Modal::begin([
        'headerOptions' => ['id' => 'modalHeader','title'=>'ddd'],
        'toggleButton' => false,
        'id' => 'modal-opened',
        'size' => 'modal-lg'
    ]);
        $form = ActiveForm::begin(['id' => 'contact-form','class'=>'contact-form']); ?>
        <?= $form->field($models, 'csv_file')->fileInput() ?>             
        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contacts']) ?>
        </div>
        <?php ActiveForm::end();
    Modal::end();

    Modal::begin([
        'headerOptions' => ['id' => 'modalHeader','title'=>'Email Send'],
        'toggleButton' => false,
        'id' => 'modal-show-success',
        'size' => 'modal-sm'
    ]); ?>
    <div class="send_success">Success</div>
    <div class="send_failed">Failed</div>    
        <?php
    Modal::end();
?>

<script type="text/javascript">
    $('#modal-btn').on('click', function (event) {
        $('#modal-opened').removeClass('fade');
        $('#modal-opened').modal('show');
    });
    function show_contacts(list_id){
        $.ajax({
            url: '<?php echo Url::toRoute('contacts/ajax-contacts-display'); ?>',
            type: 'POST',
            data: {list_id},
            dataType: "json",
            beforeSend: function() {
                $(".loading_img_div").show();
            },
            success: function (data) {
              $(".loading_img_div").hide();
            },
            error: function () {
                alert("ERROR");
            }
        });
    }

function sendEmailContact(contact_id,mongo_status) {
    //alert(contact_id);
    $.ajax({
        url: '<?php echo Url::toRoute('contacts/send-email'); ?>',
        type: 'POST',
        data: {contact_id,mongo_status},
        dataType: "json",
        beforeSend: function() {
            $(".loading_img_div").show();
        },
        success: function (data) {
            if(data.status == 'success'){
                alert(1);
                $(".loading_img_div").hide();
                $('#modal-show-success').removeClass('fade');
                $('#modal-show-success').modal('show');
                $('.send_success').show();
            }else{
                $(".loading_img_div").hide();
                $('#modal-show-success').removeClass('fade');
                $('#modal-show-success').modal('show');
                $('.send_failed').show();
            }
        },
        error: function () {
            alert("ERROR");
        }
    });
}

</script>