@extends('master')
@section('content')
<div class="contact py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
    @if($errors->isNotEmpty())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
            {{$error}}
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{ Form::open(['url'=> '/save_product','files'=>true]) }}
    <div class="contact-grids1 w3agile-6">
         <div class="row">
         <div class="col-md-6 col-sm-6 contact-form1 form-group">
                {{ Form::label('category', 'Item Category:',array('class'=>'col-form-label')) }}
                {{ Form::select('category',$cats,null,array('class'=>'form-control')) }}
                </div>
                <div class="col-md-6 col-sm-6 contact-form1 form-group">
                {{ Form::label('title', 'Item Name:',array('class','col-form-label')) }}
                {{ Form::text('title',null,array('class'=>'form-control','required'=>'required')) }}
                </div>

                <div class="col-md-6 col-sm-6 contact-form1 form-group">
                {{ Form::label('quantity', 'Item Quantity:',array('class','col-form-label')) }}
                {{ Form::number('quantity',null,['min'=>1,'max'=>5000,'class'=>'form-control','required'=>'required']) }}
                </div>
                <div class="col-md-6 col-sm-6 contact-form1 form-group">
                {{ Form::label('price', 'Item Price(KSH):',array('class','col-form-label')) }}
                {{ Form::number('price',null,['min'=>1,'max'=>100000,'required'=>'required','class'=>'form-control']) }}
                </div>
                <div class="col-md-6 col-sm-6 contact-form1 form-group">
                {{ Form::label('image', 'Item Image :',array('class','col-form-label')) }}
                {{ Form::file('image',['required'=>'required','class'=>'form-control']) }}
                </div>

        </div>
        {{Form::submit('Submit')}}
     </div>
    {{ Form::close() }}

    </div>
</div>
@stop()
