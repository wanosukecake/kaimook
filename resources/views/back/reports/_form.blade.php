<head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0/js/tempusdominus-bootstrap-4.min.js"></script>
</head>

<div class="form-group row">
    {{ Form::label('title', 'タイトル', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('title', null, [
            'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''),
            'required',
            'maxlength' => 20
        ]) }}
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {{ Form::label('type', 'レポート種別', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::select(
            'type',
            config('const.Goal'),
            null, 
            [
                'class' => 'form-control col-sm-2 form-inline' . ($errors->has('type') ? ' is-invalid' : ''),
                'id' => '',
                'style' => ''
            ]) 
        }}
        @error('type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row number none">
    {{ Form::label('number', '作業量', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-2">
        {{ Form::text('number', null, [
            'class' => 'form-control' . ($errors->has('number') ? ' is-invalid' : ''),
            'rows' => 5
        ]) }}
        @error('number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="unit" style="line-height:40px;">時間まで</div>
</div>

<div class="form-group row">
    {{ Form::label('time', '作業時間', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-2" id="timePicker" data-target-input="nearest" data-time="{{ $report['time']?? '' }}">
        {{ Form::time('time', null, [
            'class' => 'form-control' . ($errors->has('time') ? ' is-invalid' : ''),
            'rows' => 5,
        ]) }}
        @error('time')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {{ Form::label('body', 'メモ', ['class' => 'col-sm-2 col-form-label form-control-lg mb-3']) }}
    <div class="col-sm-10">
        {{ Form::textarea('body', null, [
            'class' => 'form-control text-report memo' . ($errors->has('body') ? ' is-invalid' : ''),
            'rows' => 5
        ]) }}
        @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        {{ link_to_route('back.reports.index', '一覧へ戻る', null, ['class' => 'btn btn-secondary']) }}
    </div>
</div>
<script src="{{ asset('/js/report.js') }}"></script>