

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Material;
use app\models\Systems;
use app\models\BuiltEnvironmentType;
use yii\helpers\Url;
?>

<head>
    <?= Html::csrfMetaTags() ?>
</head>
<?php
$materials = Material::find()
    ->asArray()
    ->all();

$systems = Systems::find()
    ->asArray()
    ->all();

$bets = BuiltEnvironmentType::find()
    ->asArray()
    ->all();

?>

<form id='evidence' action="evidence-entry">


Material:
    <select name="material_id" id="material_id">
        <option selected="selected">Choose one</option>
        <?php
        foreach($materials as $material) { ?>
            <option value="<?= $material['id'] ?>"><?= $material['id']." - " .$material['title'] ?></option>
            <?php
        } ?>
    </select>
<br><br>
    Systems:
    <br><br>
    <?php
        foreach($systems as $system) { ?>
            <input type="checkbox" name="systems_list[]" value="<?= $system['id'] ?>"><label><?="". $system['description'] ?></label><br/>
            <?php
        } ?>
    <br><br>
    Built Environment Types:
    <br><br>
    <?php
    foreach($bets as $bet) { ?>
        <input type="checkbox" name="bets_list[]" value="<?= $bet['id'] ?>"><label><?= $bet['description'] ?></label><br/>
        <?php
    } ?>
    <br><br>
<input type="submit" value="Submit">
</form>

