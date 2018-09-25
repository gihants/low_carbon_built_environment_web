<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MaterialHasSubject;
use app\models\Material;
use app\models\Subject;


$materials = Material::find()
    ->select('id')
    ->select('title')
    ->asArray()
    ->all();

$subjects = Subject::find()
    ->select(['id'])
    ->select(['description'])
    ->column();

$model = new MaterialHasSubject();
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]);

echo $form->field($model, 'material_id')->dropdownList([$materials],
    ['prompt'=>'Select Category']
);

echo $form->field($model, 'subject_id')->checkboxList($subjects);




 ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
