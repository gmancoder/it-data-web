@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Website Category
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('website_categories.show_fields')
                    <a href="{!! route('websiteCategories.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
