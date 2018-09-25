
<head>
<meta content="en-au" http-equiv="Content-Language">
<style type="text/css">
.auto-style2 {
	border-width: 0px;
}
.auto-style5 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #CEE2ED;
}
.auto-style6 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #CEE2ED;
}
.auto-style-green {
	border-style: solid;
	border-width: 1px;
	background-color: #00ff32;
}
.auto-style-yellow {
    border-style: solid;
    border-width: 1px;
    background-color: #FFFF00;
}
.auto-style-red {
    border-style: solid;
    border-width: 1px;
    background-color: #ff1012;
}
.auto-style-greenb {
    text-align: center;
    font-weight: bold;
    border-style: solid;
    border-width: 3px;
    background-color: #61a163;
}
.auto-style-yellowb {
    text-align: center;
    font-weight: bold;
    border-style: solid;
    border-width: 3px;
    background-color: #d88a20;
}
.auto-style-redb {
    text-align: center;
    font-weight: bold;
    border-style: solid;
    border-width: 3px;
    background-color: #8a2b2f;
}
.auto-style8 {
    border-style: solid;
    border-width: 1px;
    background-color: #CEE2ED;
}
.auto-style9 {
	color: #0000FF;
}
.auto-style11 {
	border-style: solid;
	border-width: 1px;
	background-color: #F5F5F5;
}
.auto-style11b {
    border-style: solid;
    text-align: center;
    font-weight: bold;
    border-width: 3px;
    background-color: #F5F5F5;
}
.auto-style11c {
    border-style: solid;
    text-align: center;
    border-width: 1px;
    background-color: #F5F5F5;
}
.auto-style12 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #F5F5F5;
}
.auto-style14 {
	border-style: solid;
	border-width: 1px;
}
.auto-style15 {
	color: #000000;
}
</style>
</head>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\models\AuthorsOfMaterial;
use app\models\KeywordsOfMaterial;
use app\models\SearchSourcesOfMaterial;
use app\models\FundingSourcesOfMaterial;
use app\models\BuiltEnvironmentTypesOfMaterial;
use app\models\BuiltEnvironmentScaleOfMaterial;
use app\models\SubjectsOfMaterial;
use app\models\SubjectsAreasOfMaterial;
use app\models\SystemsOfMaterial;
use app\models\IdentifiersOfMaterial;
use app\models\LicenseOfMaterial;
use app\models\ApplicationsOfMaterial;
use app\models\CopyrightsOfMaterial;
use app\models\QualityAssessmentView;
use miloschuman\highcharts\Highcharts;
use app\models\QualityAssesment;






/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */

$this->title = $model->material_key.' - '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'Review articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <h4><?= Html::encode($this->title) ?></h4>



<?php
    // keywords of the material
    $search_sources = SearchSourcesOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
    $funding_sources = FundingSourcesOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
    $authors = AuthorsOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
    $qas = QualityAssessmentView::find()->where('material_id = '.(string)$model->id)->all();

    $qa = null;
    foreach ($qas as $temp_qa) {
        $qa = $temp_qa;
    }


  	$keywords = KeywordsOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
  	$keyword_string = "";
  	foreach ($keywords as $keyword) {
		if ($keyword_string == "") {
			$keyword_string = $keyword_string.$keyword['keyword'];
		}
		else {
			$keyword_string = $keyword_string.", ".$keyword['keyword'];
		}
   		
   	}
   	
  	
  	
  	$built_environment_types = BuiltEnvironmentTypesOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
  	$bet_string = "";
  	foreach ($built_environment_types as $bet) {
		if ($bet_string == "") {
			$bet_string = $bet_string.$bet['built_environment_type'];
		}
		else {
			$bet_string = $bet_string.", ".$bet['built_environment_type'];
		}
   		
   	}


  	$copyrights = CopyrightsOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
  	$copyrights_string = "";
  	foreach ($copyrights as $copyright) {
		if ($copyrights_string == "") {
			$copyrights_string = $copyrights_string.$copyright['copyright'];
		}
		else {
			$copyrights_string = $copyrights_string.", ".$copyright['copyright'];
		}
   		
   	}

  	$applications = ApplicationsOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
  	$applications_string = "";
  	foreach ($applications as $application) {
		if ($applications_string == "") {
			$applications_string = $applications_string.$application['application'];
		}
		else {
			$applications_string = $applications_string.", ".$application['application'];
		}
   		
   	}

  	$identifiers = IdentifiersOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
  	$identifiers_string = "";
  	foreach ($identifiers as $identifier) {
		if ($identifiers_string == "") {
			$identifiers_string = $identifiers_string.$identifier['identifier_type'].": ".$identifier['identification'];
		}
		else {
			$identifiers_string = $identifiers_string.", ".$identifier['identifier_type'].": ".$identifier['identification'];
		}
   		
   	}
   	
   	$subjects = SubjectsOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
  	$subjects_string = "";
  	foreach ($subjects as $subject) {
		if ($subjects_string == "") {
			$subjects_string = $subjects_string.$subject['subject'];
		}
		else {
			$subjects_string = $subjects_string.", ".$subject['subject'];
		}
   		
   	}

    $subject_areas = SubjectsAreasOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
    $subject_areas_string = "";
    foreach ($subject_areas as $subject_area) {
        if ($subject_areas_string == "") {
            $subject_areas_string = $subject_areas_string.$subject_area['subject_area'];
        }
        else {
            $subject_areas_string = $subject_areas_string.", ".$subject_area['subject_area'];
        }

    }

    $bet_scales = BuiltEnvironmentScaleOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
    foreach ($bet_scales as $bet_scale) {
        $bet_scale_string = $bet_scale['built_environment_scale'];
    }


  	$systems = SystemsOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
  	$systems_string = "";
  	foreach ($systems as $system) {
		if ($systems_string == "") {
			$systems_string = $systems_string.$system['systems'];
		}
		else {
			$systems_string = $systems_string.", ".$system['systems'];
		}

   	}


  	$licences = LicenseOfMaterial::find()->where('material_id = '.(string)$model->id)->all();
  	$licences_string = "";
  	foreach ($licences as $licence) {
		if ($licences_string == "") {
			$licences_string = $licences_string.$licence['license_type'].":".$licence['license_no'];
		}
		else {
			$licences_string = $licences_string.", ".$licence['license_type'].": ".$licence['license_no'];
		}
   		
   	}

   	if ($model->georaphically_focussed == 1) {
  	    $georaphically_focussed = 'yes';
    }
    else {
        $georaphically_focussed = 'no';
    }

    if ($model->prisma_diagram_used == 1) {
        $prisma_diagram_used = 'yes';
    }
    else {
        $prisma_diagram_used = 'no';
    }

    if ($model->quantitative_map_included == 1) {
        $quantitative_map_included = 'yes';
    }
    else {
        $quantitative_map_included = 'no';
    }

    if ($model->peer_reviewed == 1) {
        $peer_reviewed = 'yes';
    }
    else {
        $peer_reviewed = 'no';
    }

    if ($model->number_of_original_sources <= 0) {
        $number_of_original_sources = 'not mentioned';
    }
    else {
        $number_of_original_sources = $model->number_of_original_sources;
    }

    if ($model->study_focus_starts == '') {
        $study_focus_starts = 'not mentioned';
    }
    else {
        $study_focus_starts = $model->study_focus_starts;
    }

    if ($model->study_focus_ends == '') {
        $study_focus_ends = 'not mentioned';
    }
    else {
        $study_focus_ends = $model->study_focus_ends;
    }

    if ($model->search_string == '') {
        $search_string = 'not provided';
    }
    else {
        $search_string = $model->search_string;
    }

    if ($model->conflicts_of_interest == '') {
        $conflicts_of_interest = 'not declared specifically';
    }
    else {
        $conflicts_of_interest = $model->conflicts_of_interest;
    }

    if ($model->screening_criteria == '') {
        $screening_criteria = 'not provided';
    }
    else {
        $screening_criteria = $model->screening_criteria;
    }




?>

    
    
    <h4><span class="auto-style15">Basic Article Info:</span><br class="auto-style15"></h4>
	<table class="auto-style2" style="width: 100%">
		<tr>
			<td class="auto-style5" style="height: 26px; width: 182px"><strong>
			Article key</strong></td>
			<td class="auto-style11" style="height: 26px"><?= Html::encode($model->material_key) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Title</strong></td>
			<td class="auto-style11"><?= Html::encode($model->title) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Year</strong></td>
			<td class="auto-style11"><?= Html::encode($model->year) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Review type</strong></td>
			<td class="auto-style11"><?= Html::encode($model->review_type) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Main topic</strong></td>
			<td class="auto-style11"><?= Html::encode($model->main_topic) ?></td>
		</tr>
        <tr>
            <td class="auto-style5" style="width: 182px"><strong>Subjects area(s)</strong></td>
            <td class="auto-style11"><?= Html::encode($subject_areas_string)?></td>
        </tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Built environment scale</strong></td>
			<td class="auto-style11"><?= Html::encode($bet_scale_string)?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Application(s)</strong></td>
			<td class="auto-style11"><?= Html::encode($applications_string)?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Geographically focused</strong></td>
			<td class="auto-style11"><?= Html::encode($georaphically_focussed) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Prisma diagram used</strong></td>
			<td class="auto-style11"><?= Html::encode($prisma_diagram_used) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Study focus start</strong></td>
			<td class="auto-style11"><?= Html::encode($study_focus_starts) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Study focus end</strong></td>
			<td class="auto-style11"><?= Html::encode($study_focus_ends) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Search string</strong></td>
			<td class="auto-style11"><?= Html::encode($search_string) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Screening criteria</strong></td>
			<td class="auto-style11"><?= Html::encode($screening_criteria) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>No. of original 
			sources</strong></td>
			<td class="auto-style11"><?= Html::encode($number_of_original_sources) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Synthesis 
			method</strong></td>
			<td class="auto-style11"><?= Html::encode($model->synthesis_method) ?></td>
		</tr>
        <tr>
            <td class="auto-style5" style="width: 182px"><strong>Quantitative map included</strong></td>
            <td class="auto-style11"><?= Html::encode($quantitative_map_included) ?></td>
        </tr>
		<tr>
			<td class="auto-style5" style="width: 182px"><strong>Conclusions</strong></td>
			<td class="auto-style11"><?= Html::encode($model->comclusions) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px; height: 23px;"><strong>
			Conflict of interest</strong></td>
			<td class="auto-style11" style="height: 23px"><?= Html::encode($conflicts_of_interest) ?></td>
		</tr>
		<tr>
			<td class="auto-style5" style="width: 182px; height: 23px;"><strong>
			Comments</strong></td>
			<td class="auto-style11" style="height: 23px"><?= Html::encode($model->comments) ?></td>
		</tr>
		</table>
		
    
    </div>
<p>&nbsp;</p>
<h4 class="auto-style15">Details about searches</h4>
<table style="width: 100%" class="auto-style2">
	<tr>
		<td style="width: 176px" class="auto-style8"><strong>Search sources</strong></td>
		<td class="auto-style11">
		<?php
			if ($search_sources != null){  ?>
		
				<table style="width: 100%" class="auto-style2">
					<tr>
						<td class="auto-style6"><strong>Search source name </strong></td>
						<td class="auto-style6"><strong>Source type</strong></td>
						<td class="auto-style6"><strong>Comments</strong></td>
						<td class="auto-style6"><strong>Weblink</strong></td>
					</tr>
					<?php 
					foreach ($search_sources as $search_source) { ?>
					<tr>
						<td class="auto-style14"><?= Html::encode($search_source['sarch_source_name']) ?></td>
						<td class="auto-style14"><?= Html::encode($search_source['source_type']) ?></td>
						<td class="auto-style14"><?= Html::encode($search_source['comments']) ?></td>
						<td class="auto-style14"><?= Html::encode($search_source['weblink']) ?></td>
					</tr>
					<?php } ?>
				</table>
			<?php } 
			else {
				echo ("No search sources found");
			}?>
		</td>
	</tr>
	<tr>
		<td style="width: 176px" class="auto-style8"><strong>Keywords used in search</strong></td>
		<td class="auto-style11"><?= Html::encode($keyword_string) ?></td>
	</tr>
</table>


<h4 class="auto-style9">&nbsp;</h4>
<h4 class="auto-style15">Authorship</h4>
<table style="width: 100%" class="auto-style2">
	<tr>
		<td style="width: 176px" class="auto-style8"><strong>Authors</strong></td>
		<td class="auto-style11">
		<?php
			if ($authors!= null){  ?>
		
				<table style="width: 100%" class="auto-style2">
					<tr>
						<td class="auto-style6"><strong>Name </strong></td>
						<td class="auto-style6"><strong>Email</strong></td>
						<td class="auto-style6"><strong>Organisation</strong></td>
						<td class="auto-style6"><strong>Address</strong></td>
						<td class="auto-style6"><strong>Country</strong></td>
					</tr>
					<?php 
					foreach ($authors as $author) { 
						$temp_name  = $author['name'];
						if ($author['first_author'] == 1) {
							$temp_name = $temp_name.'*';
						}
					?>
					<tr>
						<td class="auto-style14"><?= Html::encode($temp_name) ?></td>
						<td class="auto-style14"><?= Html::encode($author['email']) ?></td>
						<td class="auto-style14"><?= Html::encode($author['organisation']) ?></td>
						<td class="auto-style14"><?= Html::encode($author['address']) ?></td>
						<td class="auto-style14"><?= Html::encode($author['country']) ?></td>

					</tr>
					<?php } ?>
				</table>
			<?php } 
			else {
				echo ("No authors found");
			}?>
		</td>
	</tr>
</table>

<h4 class="auto-style9">&nbsp;</h4>
<h4 class="auto-style15">Funding</h4>
<table style="width: 100%" class="auto-style2">
	<tr>
		<td style="width: 176px" class="auto-style8"><strong>Funding sources</strong></td>
		<td class="auto-style11">
		<?php
			if ($funding_sources!= null){  ?>
		
				<table style="width: 100%" class="auto-style2">
					<tr>
						<td class="auto-style6"><strong>Funding source </strong></td>
						<td class="auto-style6"><strong>Address</strong></td>
						<td class="auto-style6"><strong>Country</strong></td>
						<td class="auto-style6"><strong>Funded year</strong></td>
						<td class="auto-style6"><strong>Comments</strong></td>
					</tr>
					<?php 
					foreach ($funding_sources as $funding_source) { 
						
					?>
					<tr>
						<td class="auto-style14"><?= Html::encode($funding_source['funding_source']) ?></td>
						<td class="auto-style14"><?= Html::encode($funding_source['address']) ?></td>
						<td class="auto-style14"><?= Html::encode($funding_source['country']) ?></td>
						<td class="auto-style14"><?= Html::encode($funding_source['funded_year']) ?></td>
						<td class="auto-style14"><?= Html::encode($funding_source['comments']) ?></td>

					</tr>
					<?php } ?>
				</table>
			<?php } 
			else {
				echo ("No funding sources recorded");
			}?>
		</td>
	</tr>
</table>



    
    <div style="overflow-x:auto;">
    
    	<h4><br class="auto-style15"><span class="auto-style15">Article publication information:</span><br class="auto-style15"></h4>
		<table class="auto-style5" style="width: 100%">
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Article 
				type</strong></td>
				<td class="auto-style11"><?= Html::encode($model->material_type) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Article 
				category</strong></td>
				<td class="auto-style11"><?= Html::encode($model->material_category) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Geographical scale</strong></td>
				<td class="auto-style11"><?= Html::encode($model->scale) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Language</strong></td>
				<td class="auto-style11"><?= Html::encode($model->language) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Chapter or 
				part</strong></td>
				<td class="auto-style11"><?= Html::encode($model->chapter_or_part) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Conference 
				date</strong></td>
				<td class="auto-style11"><?= Html::encode($model->conference_date) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Conference 
				venue</strong></td>
				<td class="auto-style11"><?= Html::encode($model->conference_venue) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Published 
				date</strong></td>
				<td class="auto-style11"><?= Html::encode($model->published_date) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px; height: 10px;"><strong>Edition</strong></td>
				<td class="auto-style11" style="height: 10px"><?= Html::encode($model->edition) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Issue</strong></td>
				<td class="auto-style11"><?= Html::encode($model->issue) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px; height: 28px">
				<strong>Journal</strong></td>
				<td class="auto-style11" style="height: 28px"><?= Html::encode($model->journal) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Pagination</strong></td>
				<td class="auto-style11"><?= Html::encode($model->pagination) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Peer 
				reviewed</strong></td>
				<td class="auto-style11"><?= Html::encode($peer_reviewed) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Publication 
				place</strong></td>
				<td class="auto-style11"><?= Html::encode($model->publication_place) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Publisher</strong></td>
				<td class="auto-style11"><?= Html::encode($model->publisher) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>School / 
				department or centre</strong></td>
				<td class="auto-style11"><?= Html::encode($model->school_department_or_centre) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Series volume 
				no.</strong></td>
				<td class="auto-style11"><?= Html::encode($model->series_volume_no) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Series 
				title</strong></td>
				<td class="auto-style11"><?= Html::encode($model->series_title) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Series 
				sort no.</strong></td>
				<td class="auto-style11"><?= Html::encode($model->series_sort_no) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Volume</strong></td>
				<td class="auto-style11"><?= Html::encode($model->volume) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Website 
				owner</strong></td>
				<td class="auto-style11"><?= Html::encode($model->website_owner) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Copyrights of article</strong></td>
				<td class="auto-style11"><?= Html::encode($copyrights_string) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Licences of article</strong></td>
				<td class="auto-style11"><?= Html::encode($licences_string) ?></td>
			</tr>
			<tr>
				<td class="auto-style8" style="width: 179px"><strong>Identifiers of article</strong></td>
				<td class="auto-style11"><?= Html::encode($identifiers_string) ?></td>
			</tr>
		</table>
    </div>

<?php
if ($qa!= null){

    $qa_scores = QualityAssesment::find()->where('material_id = '.(string)$model->id)->all();
    $qa_score = null;
    foreach ($qa_scores as $temp_qa_score) {
        $qa_score = $temp_qa_score;
    }

    ?>


<div style="overflow-x:auto;">

    <h4><br class="auto-style15"><span class="auto-style15">Quality assessment</span><br class="auto-style15"></h4>
    <table class="auto-style5" style="width: 100%">
        <tr>
            <td class="auto-style6" style="width: 100px"><strong>Quality measure</strong></td>
            <td class="auto-style6" style="width: 179px"><strong>Details</strong></td>
            <td class="auto-style6" style="width: 179px"><strong>Score</strong></td>
            <td class="auto-style6" style="width: 179px"><strong>Comments</strong></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 179px"><strong>QA question 1</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_1_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_1'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_1_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_1'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_1_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_1'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_1_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_1_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 2</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_2_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_2'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_2_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_2'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_2_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_2'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_2_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_2_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 3</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_3_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_3'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_3_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_3'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_3_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_3'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_3_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_3_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 4</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_4_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_4'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_4_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_4'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_4_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_4'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_4_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_4_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 5</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_5_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_5'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_5_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_5'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_5_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_5'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_5_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_5_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 6</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_6_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_6'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_6_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_6'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_6_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_6'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_6_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_6_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 7</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_7_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_7'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_7_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_7'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_7_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_7'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_7_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_7_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 8</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_8_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_8'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_8_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_8'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_8_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_8'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_8_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_8_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 9</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_9_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_9'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_9_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_9'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_9_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_9'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_9_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_9_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 10</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_10_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_10'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_10_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_10'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_10_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_10'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_10_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_10_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 11</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_11_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_11'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_11_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_11'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_11_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_11'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_11_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_11_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 12</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_12_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_12'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_12_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_12'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_12_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_12'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_12_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_12_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 13</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_13_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_13'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_13_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_13'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_13_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_13'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_13_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_13_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 14</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_14_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_14'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_14_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_14'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_14_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_14'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_14_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_14_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 15</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_15_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_15'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_15_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_15'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_15_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_15'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_15_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_15_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>QA question 16</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode($qa['qa_16_question']) ?></strong></td>
            <?php
            if ($qa_score['qa_16'] == '1'){ ?>
                <td class="auto-style-green"><?= Html::encode($qa['qa_16_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_16'] == '0.5') { ?>
                <td class="auto-style-yellow"><?= Html::encode($qa['qa_16_score']) ?></td>
            <?php }
            elseif ($qa_score['qa_16'] == '0') { ?>
                <td class="auto-style-red"><?= Html::encode($qa['qa_16_score']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa['qa_16_details']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>Quality index</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode('Overall rating (Quality Index) assigned to each SR, highlighting whether major concerns arose during quality assessment that may affect overall conclusions of a SR: A = Minimal flaws; B = Some flaws; C = Major flaws in many aspects of the review.') ?></strong></td>
            <?php
            if ($qa_score['quality_index'] == 'A'){ ?>
                <td class="auto-style-greenb"><?= Html::encode($qa_score['quality_index']) ?></td>
            <?php }
            elseif ($qa_score['quality_index'] == 'B') { ?>
                <td class="auto-style-yellowb"><?= Html::encode($qa_score['quality_index']) ?></td>
            <?php }
            elseif ($qa_score['quality_index'] == 'C') { ?>
                <td class="auto-style-redb"><?= Html::encode($qa_score['quality_index']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa_score['quality_index_comment']) ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>Actual review type</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode('Actual review type:systematic map, systematic review, rapid review, scoping review, narrative review, etc.') ?></strong></td>
            <td class="auto-style11b"><?= Html::encode($qa_score['actual_review_type']) ?></td>
            <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
        </tr>
        <tr>
            <td class="auto-style8" style="width: 50px"><strong>Risk of bias level</strong></td>
            <td class="auto-style8" style="width: 179px"><strong></strong><?= Html::encode('How likely are the main conclusions of the review to be  biased? Basing on review type and quality index and quality_index_comment assign: high moderate or low risk?') ?></strong></td>
            <?php
            if ($qa_score['risk_level'] == 'low'){ ?>
                <td class="auto-style-greenb"><?= Html::encode($qa_score['risk_level']) ?></td>
            <?php }
            elseif ($qa_score['risk_level'] == 'medium') { ?>
                <td class="auto-style-yellowb"><?= Html::encode($qa_score['risk_level']) ?></td>
            <?php }
            elseif ($qa_score['risk_level'] == 'high') { ?>
                <td class="auto-style-redb"><?= Html::encode($qa_score['risk_level']) ?></td>
            <?php }
            else { ?>
                <td class="auto-style11c"><?= Html::encode('N/A') ?></td>
            <?php } ?>
            <td class="auto-style11"><?= Html::encode($qa_score['risk_level_comment']) ?></td>
        </tr>
    </table>
</div>
<?php } ?>


