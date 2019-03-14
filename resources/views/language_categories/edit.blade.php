@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Language Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($languageCategory, ['route' => ['languageCategories.update', $languageCategory->id], 'method' => 'patch']) !!}

                        @include('language_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection