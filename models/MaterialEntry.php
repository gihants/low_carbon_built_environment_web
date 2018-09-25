<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property integer $id
 * @property string $title
 * @property string $year
 * @property integer $review_type_id
 * @property integer $risk_type_id
 * @property string $main_topic
 * @property integer $geographic_focus
 * @property integer $prisma_diagram_used
 * @property string $timeframe_from
 * @property string $timeframe_to
 * @property string $search_string
 * @property string $screening_criteria
 * @property integer $no_of_original_sources
 * @property integer $systhesis_method_id
 * @property integer $quantitative_map
 * @property string $conclusions
 * @property string $conflict_of_interest
 * @property string $comments
 * @property string $qa_1
 * @property string $qa_2
 * @property string $qa_3
 * @property string $qa_4
 * @property string $qa_5
 * @property string $qa_6
 * @property string $qa_7
 * @property string $qa_8
 * @property string $qa_9
 * @property string $qa_10
 * @property string $qa_11
 * @property string $qa_12
 * @property integer $scale_id
 * @property integer $material_type_id
 *
 * @property AdditionalMaterialInformation $additionalMaterialInformation
 * @property RiskType $riskType
 * @property SynthesisMethod $systhesisMethod
 * @property QaScore $qa9
 * @property QaScore $qa10
 * @property QaScore $qa11
 * @property QaScore $qa12
 * @property Scale $scale
 * @property MaterialType $materialType
 * @property QaScore $qa1
 * @property QaScore $qa2
 * @property QaScore $qa3
 * @property QaScore $qa4
 * @property QaScore $qa5
 * @property QaScore $qa6
 * @property QaScore $qa7
 * @property QaScore $qa8
 * @property ReviewType $reviewType
 * @property MaterialHasApplication[] $materialHasApplications
 * @property Application[] $applications
 * @property MaterialHasAuthor[] $materialHasAuthors
 * @property Author[] $authors
 * @property MaterialHasBuiltEnvironmentType[] $materialHasBuiltEnvironmentTypes
 * @property BuiltEnvironmentType[] $builtEnvironmentTypes
 * @property MaterialHasCopyright[] $materialHasCopyrights
 * @property CopyrightType[] $copyrights
 * @property MaterialHasFundingSource[] $materialHasFundingSources
 * @property FundingSource[] $fundingSources
 * @property MaterialHasIdentifier[] $materialHasIdentifiers
 * @property IdentifierType[] $identifierTypes
 * @property MaterialHasKeyword[] $materialHasKeywords
 * @property Keyword[] $keyWords
 * @property MaterialHasLicence[] $materialHasLicences
 * @property LicenseType[] $licenceTypes
 * @property MaterialHasSearchSource[] $materialHasSearchSources
 * @property SearchSource[] $searchSources
 * @property MaterialHasSubject[] $materialHasSubjects
 * @property Subject[] $subjects
 * @property MaterialHasSystems[] $materialHasSystems
 * @property Systems[] $systems
 */
class MaterialEntry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'year'], 'required'],
            [['year', 'timeframe_from', 'timeframe_to'], 'safe'],
            [['review_type_id', 'risk_type_id', 'geographic_focus', 'prisma_diagram_used', 'no_of_original_sources', 'systhesis_method_id', 'quantitative_map', 'scale_id', 'material_type_id'], 'integer'],
            [['conclusions'], 'string'],
            [['title'], 'string', 'max' => 500],
            [['main_topic', 'screening_criteria', 'conflict_of_interest'], 'string', 'max' => 2000],
            [['search_string', 'comments'], 'string', 'max' => 5000],
            [['qa_1', 'qa_2', 'qa_3', 'qa_4', 'qa_5', 'qa_6', 'qa_7', 'qa_8', 'qa_9', 'qa_10', 'qa_11', 'qa_12'], 'string', 'max' => 5],
            [['risk_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RiskType::className(), 'targetAttribute' => ['risk_type_id' => 'id']],
            [['systhesis_method_id'], 'exist', 'skipOnError' => true, 'targetClass' => SynthesisMethod::className(), 'targetAttribute' => ['systhesis_method_id' => 'id']],
            [['qa_9'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_9' => 'qa_score']],
            [['qa_10'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_10' => 'qa_score']],
            [['qa_11'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_11' => 'qa_score']],
            [['qa_12'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_12' => 'qa_score']],
            [['scale_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scale::className(), 'targetAttribute' => ['scale_id' => 'id']],
            [['material_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialType::className(), 'targetAttribute' => ['material_type_id' => 'id']],
            [['qa_1'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_1' => 'qa_score']],
            [['qa_2'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_2' => 'qa_score']],
            [['qa_3'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_3' => 'qa_score']],
            [['qa_4'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_4' => 'qa_score']],
            [['qa_5'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_5' => 'qa_score']],
            [['qa_6'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_6' => 'qa_score']],
            [['qa_7'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_7' => 'qa_score']],
            [['qa_8'], 'exist', 'skipOnError' => true, 'targetClass' => QaScore::className(), 'targetAttribute' => ['qa_8' => 'qa_score']],
            [['review_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReviewType::className(), 'targetAttribute' => ['review_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'year' => 'Year',
            'review_type_id' => 'Review Type ID',
            'risk_type_id' => 'Risk Type ID',
            'main_topic' => 'Main Topic',
            'geographic_focus' => 'Geographic Focus',
            'prisma_diagram_used' => 'Prisma Diagram Used',
            'timeframe_from' => 'Timeframe From',
            'timeframe_to' => 'Timeframe To',
            'search_string' => 'Search String',
            'screening_criteria' => 'Screening Criteria',
            'no_of_original_sources' => 'No Of Original Sources',
            'systhesis_method_id' => 'Systhesis Method ID',
            'quantitative_map' => 'Quantitative Map',
            'conclusions' => 'Conclusions',
            'conflict_of_interest' => 'Conflict Of Interest',
            'comments' => 'Comments',
            'qa_1' => 'Qa 1',
            'qa_2' => 'Qa 2',
            'qa_3' => 'Qa 3',
            'qa_4' => 'Qa 4',
            'qa_5' => 'Qa 5',
            'qa_6' => 'Qa 6',
            'qa_7' => 'Qa 7',
            'qa_8' => 'Qa 8',
            'qa_9' => 'Qa 9',
            'qa_10' => 'Qa 10',
            'qa_11' => 'Qa 11',
            'qa_12' => 'Qa 12',
            'scale_id' => 'Scale ID',
            'material_type_id' => 'Material Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdditionalMaterialInformation()
    {
        return $this->hasOne(AdditionalMaterialInformation::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiskType()
    {
        return $this->hasOne(RiskType::className(), ['id' => 'risk_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysthesisMethod()
    {
        return $this->hasOne(SynthesisMethod::className(), ['id' => 'systhesis_method_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa9()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_9']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa10()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_10']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa11()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_11']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa12()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_12']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScale()
    {
        return $this->hasOne(Scale::className(), ['id' => 'scale_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialType()
    {
        return $this->hasOne(MaterialType::className(), ['id' => 'material_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa1()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa2()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa3()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa4()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_4']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa5()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_5']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa6()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_6']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa7()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_7']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQa8()
    {
        return $this->hasOne(QaScore::className(), ['qa_score' => 'qa_8']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewType()
    {
        return $this->hasOne(ReviewType::className(), ['id' => 'review_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasApplications()
    {
        return $this->hasMany(MaterialHasApplication::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::className(), ['id' => 'application_id'])->viaTable('material_has_application', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasAuthors()
    {
        return $this->hasMany(MaterialHasAuthor::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->viaTable('material_has_author', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasBuiltEnvironmentTypes()
    {
        return $this->hasMany(MaterialHasBuiltEnvironmentType::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuiltEnvironmentTypes()
    {
        return $this->hasMany(BuiltEnvironmentType::className(), ['id' => 'built_environment_type_id'])->viaTable('material_has_built_environment_type', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasCopyrights()
    {
        return $this->hasMany(MaterialHasCopyright::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopyrights()
    {
        return $this->hasMany(CopyrightType::className(), ['id' => 'copyright_id'])->viaTable('material_has_copyright', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasFundingSources()
    {
        return $this->hasMany(MaterialHasFundingSource::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFundingSources()
    {
        return $this->hasMany(FundingSource::className(), ['id' => 'funding_source_id'])->viaTable('material_has_funding_source', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasIdentifiers()
    {
        return $this->hasMany(MaterialHasIdentifier::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentifierTypes()
    {
        return $this->hasMany(IdentifierType::className(), ['id' => 'identifier_type_id'])->viaTable('material_has_identifier', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasKeywords()
    {
        return $this->hasMany(MaterialHasKeyword::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeyWords()
    {
        return $this->hasMany(Keyword::className(), ['id' => 'key_word_id'])->viaTable('material_has_keyword', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasLicences()
    {
        return $this->hasMany(MaterialHasLicence::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicenceTypes()
    {
        return $this->hasMany(LicenseType::className(), ['id' => 'licence_type_id'])->viaTable('material_has_licence', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasSearchSources()
    {
        return $this->hasMany(MaterialHasSearchSource::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSearchSources()
    {
        return $this->hasMany(SearchSource::className(), ['id' => 'search_source_id'])->viaTable('material_has_search_source', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasSubjects()
    {
        return $this->hasMany(MaterialHasSubject::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['id' => 'subject_id'])->viaTable('material_has_subject', ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasSystems()
    {
        return $this->hasMany(MaterialHasSystems::className(), ['material_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSystems()
    {
        return $this->hasMany(Systems::className(), ['id' => 'systems_id'])->viaTable('material_has_systems', ['material_id' => 'id']);
    }
}
