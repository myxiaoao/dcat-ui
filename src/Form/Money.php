<?php

namespace Cooper\DcatUi\Form;

use Dcat\Admin\Admin;
use Dcat\Admin\Form\Field\Currency;

class Money extends Currency
{
    public $symbol;

    public function inputmask($options)
    {
        Admin::js('@jquery.inputmask');
        $options['onBeforeMask'] = <<<'EOT'
function(value, opts) {
    return (value / 100).toPrecision(12);
}
EOT;
        $options['onBeforePaste'] = <<<'EOT'
function(value, opts) {
    return value;
}
EOT;
        $options['autoUnmask'] = true;
        $options['onUnMask'] = <<<'EOT'
function(maskedValue, unmaskedValue, opts) {
    return (unmaskedValue * 100).toPrecision(12);
}
EOT;
        $options['groupSeparator'] = '';    // 临时解决带逗号数值转换的问题
        $options = $this->json_encode_options($options);

        $this->script = "Dcat.init('{$this->getElementClassSelector()}', function (self) {
            self.inputmask({$options}).on('focus',function(){
                var that = $(this);
                setTimeout(function(){
                  that.select();
                },1)
            });
        });";

        return $this;
    }

    function json_encode_options(array $options)
    {
        $data = $this->prepare_options($options);

        $json = json_encode($data['options']);

        return str_replace($data['toReplace'], $data['original'], $json);
    }

    function prepare_options(array $options)
    {
        $original = [];
        $toReplace = [];

        foreach ($options as $key => &$value) {
            if (is_array($value)) {
                $subArray = $this->prepare_options($value);
                $value = $subArray['options'];
                $original = array_merge(...$subArray['original']);
                $toReplace = array_merge(...$subArray['toReplace']);
            } elseif (str_starts_with((string)$value, 'function(')) {
                $original[] = $value;
                $value = "%{$key}%";
                $toReplace[] = "\"{$value}\"";
            }
        }

        return compact('original', 'toReplace', 'options');
    }

    public function render()
    {
        $this->symbol($this->symbol)->defaultAttribute(
            'value',
            old($this->elementName ?: $this->column, $this->value())
        );

        return parent::render();
    }
}
