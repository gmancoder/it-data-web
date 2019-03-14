@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Television Show
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($televisionShow, ['route' => ['televisionShows.update', $televisionShow->id], 'method' => 'patch']) !!}

                        @include('television_shows.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection