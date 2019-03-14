@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            News Feed
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($newsFeed, ['route' => ['newsFeeds.update', $newsFeed->id], 'method' => 'patch']) !!}

                        @include('news_feeds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection