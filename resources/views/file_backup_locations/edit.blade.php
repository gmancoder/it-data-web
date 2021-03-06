@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            File Backup Location
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fileBackupLocation, ['route' => ['fileBackupLocations.update', $fileBackupLocation->id], 'method' => 'patch']) !!}

                        @include('file_backup_locations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection