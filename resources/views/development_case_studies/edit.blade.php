@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Development Case Study
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($developmentCaseStudy, ['route' => ['developmentCaseStudies.update', $developmentCaseStudy->id], 'method' => 'patch']) !!}

                        @include('development_case_studies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection