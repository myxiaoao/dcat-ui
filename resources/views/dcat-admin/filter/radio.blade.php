<style>
    .input-group-sm .vs-radio-con {
        margin-top: -2px !important;
        margin-right: 20px;
    }
</style>
<div class="input-group input-group-sm">
    @php
        $radio = new \Dcat\Admin\Widgets\Radio($name, $options);
        if ($inline) $radio->inline();

        $radio->check(request($name, is_null($value) ? [] : $value));

    @endphp
    @if($showLabel)
        <div class="input-group-prepend">
            <span class="input-group-text bg-white text-capitalize"><b>{!! $label !!}</b></span>
        </div>
        <div class="form-control">
            {!! $radio !!}
        </div>
    @else
        {!! $radio !!}
    @endif
</div>
