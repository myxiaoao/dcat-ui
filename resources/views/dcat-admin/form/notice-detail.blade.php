<div class="content-body" id="app">
    <div class="row ">
        <div class="col-md-12">
            <div class="card dcat-box">
                <div class="box-header flex-column position-relative">
                    <h2 class="text-center flex-grow-1" style="width:80%">{{$title}}</h2>
                    <div class="text-center font-sm-3">发布时间：{{ $time }}</div>
                    <div class="box-tools position-absolute" style="bottom:0; right: 1.5rem">
                        <a href="{{ $list_url }}" class="btn btn-sm btn-default">
                            <i class="fa fa-arrow-left"></i>&nbsp;返回
                        </a>
                    </div>
                </div>
                <div class="box-body notice-content">
                    <div class="pl-2 pr-2 pt-1 border-top font-md-3">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
