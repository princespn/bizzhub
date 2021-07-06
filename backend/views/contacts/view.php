<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ContactList */

$this->title = "Contact View";
$this->params['breadcrumbs'][] = ['label' => 'Contact', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contact-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'  => 'Id',
                'value'  => $viewData['id'],
            ],
            [
                'label'  => 'Name',
                'value'  => $viewData['name'],
            ],
            [
                'label'  => 'First Name',
                'value'  => $viewData['first_name'],
            ],
            [
                'label'  => 'Last Name',
                'value'  => $viewData['last_name'],
            ],
            [
                'label'  => 'Stage',
                'value'  => $viewData['stage'],
            ],
            [
                'label'  => 'Source',
                'value'  => $viewData['source'],
            ],
            [
                'label'  => 'Source Url',
                'value'  => $viewData['sourceUrl'],
            ],
            [
                'label'  => 'Contacted',
                'value'  => $viewData['contacted'],
            ],
            [
                'label'  => 'Price',
                'value'  => $viewData['price'],
            ],
            [
                'label'  => 'Assigned To',
                'value'  => $viewData['assignedTo'],
            ],
            [
                'label'  => 'Claimed',
                'value'  => $viewData['claimed'],
            ],
            [
                'label'  => 'Created Via',
                'value'  => $viewData['createdVia'],
            ],
            [
                'label'  => 'Tags',
                'value'  => $viewData['tags'],
            ],
            [
                'label'  => 'Email',
                'value'  => $viewData['email'],
            ],
            [
                'label'  => 'Phone',
                'value'  => $viewData['phone'],
            ],
            [
                'label'  => 'Gender',
                'value'  => $viewData['gender'],
            ],
            [
                'label'  => 'Age',
                'value'  => $viewData['age'],
            ],
            [
                'label'  => 'Location',
                'value'  => $viewData['location'],
            ],
            [
                'label'  => 'Company',
                'value'  => $viewData['company'],
            ],
            [
                'label'  => 'Title',
                'value'  => $viewData['title'],
            ],
            [
                'label'  => 'Bio',
                'value'  => $viewData['bio'],
            ],
            [
                'label'  => 'Topics',
                'value'  => $viewData['topics'],
            ],
            [
                'label'  => 'Facebook',
                'value'  => $viewData['facebook'],
            ],
            [
                'label'  => 'Twitter',
                'value'  => $viewData['twitter'],
            ],
            [
                'label'  => 'Google Profile',
                'value'  => $viewData['googleProfile'],
            ],
            [
                'label'  => 'Google Plus',
                'value'  => $viewData['googlePlus'],
            ],
            [
                'label'  => 'LinkedIn',
                'value'  => $viewData['linkedIn'],
            ],
            [
                'label'  => 'Address Type',
                'value'  => $viewData['address_type'],
            ],
            [
                'label'  => 'Street',
                'value'  => $viewData['street'],
            ],
            [
                'label'  => 'City',
                'value'  => $viewData['city'],
            ],
            [
                'label'  => 'State',
                'value'  => $viewData['state'],
            ],
            [
                'label'  => 'ZIP',
                'value'  => $viewData['zip'],
            ],
            [
                'label'  => 'Country',
                'value'  => $viewData['country'],
            ],
            [
                'label'  => 'Created Date',
                'value'  => date('Y-m-d',$viewData['created_date']),
            ],
            [
                'label'  => 'Updated Date',
                'value'  => date('Y-m-d',$viewData['updated_date']),
            ],

        ],
    ]) ?>

</div>
