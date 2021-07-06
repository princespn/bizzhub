<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rbac_auth_item".
 *
 * @property string $name
 * @property int $type
 * @property string|null $description
 * @property string|null $rule_name
 * @property resource|null $data
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property RbacAuthItem[] $children
 * @property RbacAuthItem[] $parents
 * @property RbacAuthAssignment[] $rbacAuthAssignments
 * @property RbacAuthItemChild[] $rbacAuthItemChildren
 * @property RbacAuthItemChild[] $rbacAuthItemChildren0
 * @property RbacAuthRule $ruleName
 */
class RbacAuthItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rbac_auth_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['name'], 'unique'],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => RbacAuthRule::className(), 'targetAttribute' => ['rule_name' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Children]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(RbacAuthItem::className(), ['name' => 'child'])->viaTable('rbac_auth_item_child', ['parent' => 'name']);
    }

    /**
     * Gets query for [[Parents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(RbacAuthItem::className(), ['name' => 'parent'])->viaTable('rbac_auth_item_child', ['child' => 'name']);
    }

    /**
     * Gets query for [[RbacAuthAssignments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAuthAssignments()
    {
        return $this->hasMany(RbacAuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * Gets query for [[RbacAuthItemChildren]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAuthItemChildren()
    {
        return $this->hasMany(RbacAuthItemChild::className(), ['parent' => 'name']);
    }

    /**
     * Gets query for [[RbacAuthItemChildren0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRbacAuthItemChildren0()
    {
        return $this->hasMany(RbacAuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * Gets query for [[RuleName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(RbacAuthRule::className(), ['name' => 'rule_name']);
    }
}
