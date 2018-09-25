<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "additional_material_information".
 *
 * @property integer $material_id
 * @property string $journal_name
 * @property string $volume
 * @property string $issue
 * @property string $pagination
 * @property string $date_published
 * @property string $language
 * @property integer $peer_reviewed
 * @property string $publisher_name
 * @property string $chapter_or_part
 * @property string $conference_date
 * @property string $conference_place
 * @property string $edition
 * @property string $publication_place
 * @property string $school_or_department_or_centre
 * @property string $series_sort_no
 * @property string $series_title
 * @property string $series_volume_no
 * @property string $website_owner
 *
 * @property Material $material
 */
class AdditionalMaterialInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'additional_material_information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id'], 'required'],
            [['material_id', 'peer_reviewed'], 'integer'],
            [['date_published', 'conference_date'], 'safe'],
            [['journal_name', 'pagination', 'publisher_name', 'chapter_or_part', 'conference_place', 'publication_place', 'school_or_department_or_centre', 'series_title', 'website_owner'], 'string', 'max' => 200],
            [['volume', 'issue', 'language', 'edition', 'series_sort_no', 'series_volume_no'], 'string', 'max' => 100],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'journal_name' => 'Journal Name',
            'volume' => 'Volume',
            'issue' => 'Issue',
            'pagination' => 'Pagination',
            'date_published' => 'Date Published',
            'language' => 'Language',
            'peer_reviewed' => 'Peer Reviewed',
            'publisher_name' => 'Publisher Name',
            'chapter_or_part' => 'Chapter Or Part',
            'conference_date' => 'Conference Date',
            'conference_place' => 'Conference Place',
            'edition' => 'Edition',
            'publication_place' => 'Publication Place',
            'school_or_department_or_centre' => 'School Or Department Or Centre',
            'series_sort_no' => 'Series Sort No',
            'series_title' => 'Series Title',
            'series_volume_no' => 'Series Volume No',
            'website_owner' => 'Website Owner',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }
}
