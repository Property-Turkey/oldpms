<div class="col-12 col-lg-12">
    <h4><?= __('payment_plan') ?></h4>
</div>

<div class="col-lg-3 col-6 mb-3 ngif">
    <label><?= __('property_currency') ?></label>
    <div class="div">
        <?= $this->Form->control('project_currency', [
            'class' => 'form-control has-feedback-left',
            'label' => false,
            'type' => 'select',
            'ng-change' => "rec.project.id > 0 ? doSave(rec.project, 'project', 'projects',  '#project_btn', false) : '';",
            'ng-model' => 'rec.project.project_currency',
            'options' => $this->Do->lcl($this->Do->get('currencies')),
            'templateContainer' => '{{content}}'
        ]) ?>
        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
    </div>
</div>

<div class="col-lg-3 col-6 mb-3 ngif">
    <label><?= __('param_downpayment') ?></label>
    <div class="div">
        <?= $this->Form->control('param_downpayment', [
            'class' => 'form-control has-feedback-left',
            'label' => false,
            'type' => 'text',
            'only-numbers' => '0-100',
            'mask-currency' => 'false',
            'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
            'placeholder' => __('param_downpayment'),
            'ng-model' => 'rec.project.param_downpayment',
            'templateContainer' => '{{content}}',
            'maxlength' => '2',
            'ng-change' => 'rec.project.param_installment = 100 - rec.project.param_downpayment'
        ]) ?>
        <span class="fa fa-percent form-control-feedback left" aria-hidden="true"></span>
    </div>
</div>

<div class="col-lg-3 col-6 mb-3 ngif">
    <label><?= __('param_installment') ?></label>
    <div class="div">
        <?= $this->Form->control('param_installment', [
            'class' => 'form-control has-feedback-left',
            'label' => false,
            'type' => 'text',
            'only-numbers' => '5-100',
            'mask-currency' => 'false',
            'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
            'placeholder' => __('param_installment'),
            'ng-model' => 'rec.project.param_installment',
            'templateContainer' => '{{content}}',
            'maxlength' => '2',
            'disabled' => true
        ]) ?>
        <span class="fa fa-percent form-control-feedback left" aria-hidden="true"></span>
    </div>
</div>

<div class="col-lg-3 col-6 mb-3 ngif">
    <label><?= __('param_installment_months') ?></label>
    <div class="div">
        <?= $this->Form->control('param_installment_months', [
            'class' => 'form-control has-feedback-left',
            'label' => false,
            'type' => 'text',
            'only-numbers' => '0-75',
            'mask-currency' => 'false',
            'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
            'placeholder' => __('param_installment_months'),
            'ng-model' => 'rec.project.param_installment_months',
            'templateContainer' => '{{content}}',
            'maxlength' => '2'
        ]) ?>
        <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
    </div>
</div>