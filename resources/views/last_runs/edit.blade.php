@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Last Run
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lastRun, ['route' => ['lastRuns.update', $lastRun->id], 'method' => 'patch']) !!}

                        @include('last_runs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection