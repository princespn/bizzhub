<?php
/**
 * Created by PhpStorm.
 * User: Asalta15
 * Date: 18/9/2015
 * Time: 3:21 PM
 */
namespace common\components;

class AdminPrivileges {

    public static function forContact()
    {
        return ['addContact' => ' New Contact',
            'updateContact' => 'Update Contact',
            'listContact' => 'List Contact',
            'importContact' => 'Import  Contact',
            'loginToBackend' => 'login To Backend',
            'deleteContact' => 'Delete Contact'];
    }

        public static function forContactList()
    {
        return ['createContactlist' => ' New Contact List',
            'listContactlist' => 'List Contact List',
            'updateContactlist' => 'Update Contact List',
            'deleteContactlis' => 'Delete Contact List'];
      }

  public static function forTemplate()
    {
        return ['createTemplate' => ' Add Template',
            'listTemplate' => 'List Template',
            'updateTemplate' => 'Update Template',
            'deleteTemplate' => 'Delete Template'];
    }

      public static function forCategory()
    {
        return ['createCategory' => ' Add Category',
            'listCategory' => 'List Category',
            'updateCategory' => 'Update Category',
            'deleteCategory' => 'Delete Category'];
    }

         public static function forForm()
    {
        return ['createForm' => ' Add New Form',
            'listForm' => 'List Form',
            'updateForm' => 'Update Form',
            'deleteForm' => 'Delete Form'];
    }

       public static function forClientData()
    {
        return [
            'listClientData' => 'List Client Data',
            'updateClientData' => 'Update Client Data',
            'deleteClientData' => 'Delete Client Data'];
    }

           public static function forBuildings()
    {
        return ['createBuildings' => ' Add Buildings',
            'listBuildings' => 'List Buildings',
            'updateBuildings' => 'Update Buildings',
            'deleteBuildings' => 'Delete Buildings'];
    }

public static function forSupports()
    {
        return ['createSupports' => ' Add Supports',
            'listSupports' => 'List Supports',
            'updateSupports' => 'Update Supports',
            'deleteSupports' => 'Delete Supports'];
    }

    public static function forTraining()
    {
        return ['createTraining' => ' Add Training',
            'listTraining' => 'List Training',
            'updateTraining' => 'Update Training',
            'deleteTraining' => 'Delete Training'];
    }

     public static function forDocument()
    {
        return ['createDocument' => ' Add Document',
        'createDocumentcategory' => ' Add Document Category',
        'listDocumentcategory' => ' List Document Category',
            'listDocument' => 'List Document',
            'updateDocument' => 'Update Document',
            'deleteDocument' => 'Delete Document'];
    }

     public static function forTimelineevent()
    {
        return [
            'listTimelineevent' => 'List Timeline-event',];
    }

public static function forRets()
    {
        return [
            'listRets' => 'List Rets Property',];
    }

public static function forLeaderboard()
    {
        return [
            'listLeaderboard' => 'List Leaderboard',];
    }

public static function forStaticPage()
    {
        return [
            'listStaticPage' => 'List StaticPage',];
    }

public static function forArticle()
    {
        return [
            'listArticle' => 'List Article',];
    }

public static function forCategorycon()
    {
        return [
            'listCategorycon' => 'List Category Content',];
    }

    }