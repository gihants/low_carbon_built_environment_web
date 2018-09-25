<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Low carbon built environment (meta-review)',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
        ['label' => 'Home', 'url' => ['/site/index']],
         ['label' => 'List of reviews', 'url' => ['/material-info-view/index']],
        
        /* [
            'label' => 'Plural Properties of Materials',
            'items' => [
            '<li class="divider"></li>',
                 '<li class="dropdown-header">Main Properties</li>',
                 
                                 ['label' => 'Authors of Materials', 'url' => ['/authors-of-material/index']],
                                 ['label' => 'Built Environment Types of Materials', 'url' => ['/built-environment-types-of-material/index']],
				
                 ['label' => 'Search Sources', 'url' => ['/search-sources-of-material/index']],
                 
                 ['label' => 'Keywords of Materials', 'url' => ['/keywords-of-material/index']],
                 ['label' => 'Funding Sources of Materials', 'url' => ['/funding-sources-of-material/index']],
                 ['label' => 'Applications of Materials', 'url' => ['/applications-of-material/index']],
 
                 
                 
                 ['label' => 'Subjects of Materials', 'url' => ['/subjects-of-material/index']],
                 ['label' => 'Systems of Materials', 'url' => ['/systems-of-material/index']],

                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Document Properties</li>',
                 ['label' => 'Copyrights of Materials', 'url' => ['/copyrights-of-material/index']],
                 ['label' => 'Identifiers of Materials', 'url' => ['/identifiers-of-material/index']],
                 ['label' => 'Licensce of Materials', 'url' => ['/license-of-material/index']],
            ],
        ],*/
        
        /*[
            'label' => 'Base Parameter Lists',
            'items' => [
            
            	[
            'label' => 'Review Method Related',
            'items' => [

    
                                 ['label' => 'Review Types', 'url' => ['/review-type/index']],
                                 ['label' => 'Risk Types', 'url' => ['/risk-type/index']],
				
                 ['label' => 'Scales', 'url' => ['/scale/index']],
                 
                 ['label' => 'Keywords', 'url' => ['/keyword/index']],
                 ['label' => 'Synthesis Methods', 'url' => ['/synthesis-method/index']],
                 ['label' => 'Search Sources', 'url' => ['/search-source/index']],
                 ['label' => 'Quality Assesment', 'url' => ['/qa-score/index']],

 
                 ],],
                 
                 
                 [
            'label' => 'Built Environment Related',
            'items' => [

				
                 ['label' => 'Built Environment Types', 'url' => ['/built-environment-type/index']],
                 
                 ['label' => 'Applications', 'url' => ['/application/index']],
                ['label' => 'Subject Areas', 'url' => ['/subject-area/index']],
                                 ['label' => 'Subjects', 'url' => ['/subject/index']],
                 ['label' => 'Systems', 'url' => ['/system/index']],
                 
 
                 ],],
                 
                 
                 [
            'label' => 'Authors and Organisations',
            'items' => [

				
                 ['label' => 'Authors', 'url' => ['/author/index']],
                 
                 ['label' => 'Organisations', 'url' => ['/organisation/index']],
    

                 ['label' => 'Countries', 'url' => ['/country/index']],
                 
 
                 ],],
                 
                [ 'label' => 'Document Meta-info',
            'items' => [

				
                 ['label' => 'Material Types', 'url' => ['/material-type/index']],
                 
                 ['label' => 'Material Categories', 'url' => ['/material-category/index']],
    

                 ['label' => 'License Types', 'url' => ['/license-type/index']],
                 
                 ['label' => 'Identifier Types', 'url' => ['/identifier-type/index']],
                 
 
                 ],],

                [ 'label' => 'Quality Assessment',
                    'items' => [


                        ['label' => 'Quality Assessment Scheme', 'url' => ['/qality-assesment-scheme/index']],

                    ],],









            ],


        ],*/
            ['label' => 'Quality assessment scheme', 'url' => ['/quality-assessment-scheme/index']],

            [
                'label' => 'Graphical summaries',
                'items' => [[


                    'label' =>'Publication information',
                    'items' =>[
                            ['label' => 'Reviews per year', 'url' => ['/heat-maps/articles-by-year']],
                            ['label' => 'Wordcloud of journals', 'url' => ['/heat-maps/journal-cloud']],
                            ['label' => 'Geographical distribution of first authors', 'url' => ['/heat-maps/first-author-countries']],
                            ['label' => 'Geographical distribution of organisations', 'url' => ['/heat-maps/organisation-distribution']],
                    ]],

                    ['label'=> 'Searching and Screening',
                    'items' => [
                            ['label' => 'Studies per review', 'url' => ['/heat-maps/no-original-sources']],
                            ['label' => 'Search sources per review', 'url' => ['/heat-maps/search-sources-per-paper']],
                            ['label' => 'Most popular search sources', 'url' => ['/heat-maps/search-source-usage']],
                            ['label' => 'Wordcloud of search terms', 'url' => ['/heat-maps/search-term-cloud']],
                    ]],

                    [ 'label' =>'Topics covered',
                    'items' => [
                            ['label' => 'Subject areas vs Built environment scales', 'url' => ['/heat-maps/subject-area-bet-scale']],
                            ['label' => 'Subject areas vs Applications', 'url' => ['/heat-maps/subject-area-application']],
                            ['label' => 'Applications vs Built environment scales', 'url' => ['/heat-maps/application-bet-scale']],
                    ]],

                    [ 'label' =>'Quality assessment',
                        'items' => [

                            ['label' => 'Quality of reviews', 'url' => ['/heat-maps/quality-index']],
                            ['label' => 'Detailed quality assessment of reviews', 'url' => ['/heat-maps/quality-assessment-questions-summary']],
                            ['label' => 'Risk-of-bias of reviews', 'url' => ['/heat-maps/risk-of-bias']],
                            ['label' => 'Quality by Subject area', 'url' => ['/heat-maps/quality-assessment-subject-area']],
                            ['label' => 'Quality by year', 'url' => ['/heat-maps/quality-index-year']],
                            ['label' => 'Risk of bias by year', 'url' => ['/heat-maps/risk-of-bias-year']],
                            ['label' => 'Claimed vs suggested review types', 'url' => ['/heat-maps/review-types-comparison']],


                    ]],




                ],
            ],

            
            //['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
           /* Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )*/
        ],
    ]);
    NavBar::end();

    $this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => 'https://researchweaving.com/rw.png']);
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <a href="https://www.researchweaving.com/">Research Weaving</a> @ <a href="http://www.i-deel.org/">I-DEEL</a> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
