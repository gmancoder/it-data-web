@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inbound Package Log
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($inboundPackageLog, ['route' => ['inboundPackageLogs.update', $inboundPackageLog->id], 'method' => 'patch']) !!}

                        @include('inbound_package_logs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection