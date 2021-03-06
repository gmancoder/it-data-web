@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Television Show Episode
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($televisionShowEpisode, ['route' => ['televisionShowEpisodes.update', $televisionShowEpisode->id], 'method' => 'patch']) !!}

                        @include('television_show_episodes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection