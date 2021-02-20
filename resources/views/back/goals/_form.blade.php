 
<div class="form-group row">
    {{ Form::label('type', '種類', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::select(
            'type',
            config('const.Goal'),
            null, 
            [
                'class' => 'form-control col-sm-2 form-inline' . ($errors->has('body') ? ' is-invalid' : ''),
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

<div class="form-group row">
    {{ Form::label('goal', '内容', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-1">
        {{ Form::text('goal', null, [
            'class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''),
            'rows' => 5
        ]) }}
        @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="unit" style="line-height:40px;">時間まで</div>
</div>

<div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">保存</button>
        {{ link_to_route('back.goals.index', '一覧へ戻る', null, ['class' => 'btn btn-secondary']) }}
    </div>
</div>