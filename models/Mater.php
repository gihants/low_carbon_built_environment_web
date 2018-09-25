<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_info_view".
 *
 * @property integer $id
 * @property string $title
 * @property string $year
 * @property string $review_type
 * @property string $risk_type
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
 * @property string $qa_score_1
 * @property string $qa_score_2
 * @property string $qa_score_3
 * @property string $qa_score_4
 * @property string $qa_score_5
 * @property string $qa_score_6
 * @property string $qa_score_7
 * @property string $qa_score_8
 * @property string $qa_score_9
 * @property string $qa_score_10
 * @property string $qa_score_11
 * @property string $qa_score_12
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
class Mater extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_info_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'georaphically_focussed', 'prisma_diagram_used', 'number_of_original_sources', 'quantitative_map_included', 'peer_reviewed'], 'integer'],
            [['title', 'year'], 'required'],
            [['year', 'study_focus_starts', 'study_focus_ends', 'conference_date', 'published_date'], 'safe'],
            [['comclusions'], 'string'],
            [['title'], 'string', 'max' => 500],
            [['review_type', 'language', 'edition', 'issue', 'series_sort_no', 'series_volume_no', 'volume'], 'string', 'max' => 100],
            [['risk_type'], 'string', 'max' => 45],
            [['main_topic', 'screening_criteria', 'conflicts_of_interest'], 'string', 'max' => 2000],
            [['search_string', 'comments'], 'string', 'max' => 5000],
            [['synthesis_method'], 'string', 'max' => 50],
            [['scale', 'material_type', 'material_category', 'qa_score_1', 'qa_score_2', 'qa_score_3', 'qa_score_4', 'qa_score_5', 'qa_score_6', 'qa_score_7', 'qa_score_8', 'qa_score_9', 'qa_score_10', 'qa_score_11', 'qa_score_12', 'chapter_or_part', 'conference_venue', 'journal', 'pagination', 'publication_place', 'publisher', 'school_department_or_centre', 'series_title', 'website_owner'], 'string', 'max' => 200],
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
            'review_type' => 'Review Type',
            'risk_type' => 'Risk Type',
            'main_topic' => 'Main Topic',
            'georaphically_focussed' => 'Georaphically Focussed',
            'prisma_diagram_used' => 'Prisma Diagram Used',
            'study_focus_starts' => 'Study Focus Starts',
            'study_focus_ends' => 'Study Focus Ends',
            'screening_criteria' => 'Screening Criteria',
            'search_string' => 'Search String',
            'number_of_original_sources' => 'Number Of Original Sources',
            'synthesis_method' => 'Synthesis Method',
            'quantitative_map_included' => 'Quantitative Map Included',
            'comclusions' => 'Comclusions',
            'conflicts_of_interest' => 'Conflicts Of Interest',
            'comments' => 'Comments',
            'scale' => 'Scale',
            'material_type' => 'Material Type',
            'material_category' => 'Material Category',
            'qa_score_1' => 'Qa Score 1',
            'qa_score_2' => 'Qa Score 2',
            'qa_score_3' => 'Qa Score 3',
            'qa_score_4' => 'Qa Score 4',
            'qa_score_5' => 'Qa Score 5',
            'qa_score_6' => 'Qa Score 6',
            'qa_score_7' => 'Qa Score 7',
            'qa_score_8' => 'Qa Score 8',
            'qa_score_9' => 'Qa Score 9',
            'qa_score_10' => 'Qa Score 10',
            'qa_score_11' => 'Qa Score 11',
            'qa_score_12' => 'Qa Score 12',
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
