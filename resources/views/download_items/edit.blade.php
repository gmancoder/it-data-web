@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Download Item
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($downloadItem, ['route' => ['downloadItems.update', $downloadItem->id], 'method' => 'patch']) !!}

                        @include('download_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection