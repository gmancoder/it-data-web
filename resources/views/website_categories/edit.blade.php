@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Website Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($websiteCategory, ['route' => ['websiteCategories.update', $websiteCategory->id], 'method' => 'patch']) !!}

                        @include('website_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection