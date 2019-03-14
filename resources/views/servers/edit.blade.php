@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Server
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($server, ['route' => ['servers.update', $server->id], 'method' => 'patch']) !!}

                        @include('servers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection