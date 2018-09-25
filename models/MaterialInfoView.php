<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_info_view".
 *
 * @property integer $id
 * @property string $material_key
 * @property string $Authors
 * @property string $quality_index
 * @property string $quality_index_comment
 * @property string $risk_level
 * @property string $risk_level_comment
 * @property string $actual_review_type
 * @property string $title
 * @property string $year
 * @property string $review_type
 * @property string $main_topic
 * @property integer $georaphically_focussed
 * @property integer $prisma_diagram_used
 * @property string $study_focus_starts
 * @property string $study_focus_ends
 * @property string $screening_criteria
 * @property string $search_string
 * @property integer $number_of_original_sources
 * @property string $synthesis_method
 * @property integer $quantitative_map_included
 * @property string $comclusions
 * @property string $conflicts_of_interest
 * @property string $comments
 * @property string $scale
 * @property string $material_type
 * @property string $material_category
 * @property string $language
 * @property string $chapter_or_part
 * @property string $conference_date
 * @property string $conference_venue
 * @property string $published_date
 * @property string $edition
 * @property string $issue
 * @property string $journal
 * @property string $pagination
 * @property integer $peer_reviewed
 * @property string $publication_place
 * @property string $publisher
 * @property string $school_department_or_centre
 * @property string $series_sort_no
 * @property string $series_title
 * @property string $series_volume_no
 * @property string $volume
 * @property string $website_owner
 */
class MaterialInfoView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_info_view';
    }
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'georaphically_focussed', 'prisma_diagram_used', 'number_of_original_sources', 'quantitative_map_included', 'peer_reviewed'], 'integer'],
            [['Authors', 'quality_index_comment', 'risk_level_comment', 'comclusions'], 'string'],
            [['title', 'year'], 'required'],
            [['year', 'study_focus_starts', 'study_focus_ends', 'conference_date', 'published_date'], 'safe'],
            [['material_key'], 'string', 'max' => 20],
            [['quality_index'], 'string', 'max' => 1],
            [['risk_level'], 'string', 'max' => 10],
            [['actual_review_type', 'review_type', 'language', 'edition', 'issue', 'series_sort_no', 'series_volume_no', 'volume'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 500],
            [['main_topic', 'screening_criteria', 'conflicts_of_interest'], 'string', 'max' => 2000],
            [['search_string', 'comments'], 'string', 'max' => 5000],
            [['synthesis_method'], 'string', 'max' => 50],
            [['scale', 'material_type', 'material_category', 'chapter_or_part', 'conference_venue', 'journal', 'pagination', 'publication_place', 'publisher', 'school_department_or_centre', 'series_title', 'website_owner'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Database ID',
            'material_key' => 'Article key',
            'Authors' => 'Authors',
            'quality_index' => 'Quality index',
            'quality_index_comment' => 'Quality Index Comment',
            'risk_level' => 'Risk of bias',
            'risk_level_comment' => 'Risk Level Comment',
            'actual_review_type' => 'Actual review type',
            'title' => 'Title',
            'year' => 'Year',
            'review_type' => 'Claimed review type',
            'main_topic' => 'Main topic',
            'georaphically_focussed' => 'Georaphically Focussed',
            'prisma_diagram_used' => 'Prisma Diagram Used',
            'study_focus_starts' => 'Study Focus Starts',
            'study_focus_ends' => 'Study Focus Ends',
            'screening_criteria' => 'Screening Criteria',
            'search_string' => 'Search String',
            'number_of_original_sources' => 'Number Of Original Sources',
            'synthesis_method' => 'Synthesis Method',
            'quantitative_map_included' => 'Quantitative Map Included',
            'comclusions' => 'Conclusions',
            'conflicts_of_interest' => 'Conflicts Of Interest',
            'comments' => 'Comments',
            'scale' => 'Scale',
            'material_type' => 'Material Type',
            'material_category' => 'Material Category',
            'language' => 'Language',
            'chapter_or_part' => 'Chapter Or Part',
            'conference_date' => 'Conference Date',
            'conference_venue' => 'Conference Venue',
            'published_date' => 'Published Date',
            'edition' => 'Edition',
            'issue' => 'Issue',
            'journal' => 'Journal',
            'pagination' => 'Pagination',
            'peer_reviewed' => 'Peer Reviewed',
            'publication_place' => 'Publication Place',
            'publisher' => 'Publisher',
            'school_department_or_centre' => 'School Department Or Centre',
            'series_sort_no' => 'Series Sort No',
            'series_title' => 'Series Title',
            'series_volume_no' => 'Series Volume No',
            'volume' => 'Volume',
            'website_owner' => 'Website Owner',
        ];
    }
}
